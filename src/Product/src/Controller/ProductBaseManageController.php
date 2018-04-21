<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */
 
declare(strict_types=1);
 
namespace Tracker\Admin\Product\Controller;

use Admin\App\Controller\EntityManageBaseController;
use Admin\App\Service\EntityServiceInterface;
use Dot\Controller\AbstractActionController;
use Dot\Controller\Plugin\Authentication\AuthenticationPlugin;
use Dot\Controller\Plugin\Authorization\AuthorizationPlugin;
use Dot\Controller\Plugin\FlashMessenger\FlashMessengerPlugin;
use Dot\Controller\Plugin\Forms\FormsPlugin;
use Dot\Controller\Plugin\TemplatePlugin;
use Dot\Controller\Plugin\UrlHelperPlugin;
use Dot\FlashMessenger\FlashMessengerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Form\Form;
use Zend\Paginator\Paginator;
use Zend\Session\Container;

/**
 * Class ProductBaseManageController
 * @package Tracker\Admin\Product\Controller
 */
class ProductBaseManageController extends EntityManageBaseController
{
    const ENTITY_NAME_SINGULAR = 'product';
    const ENTITY_NAME_PLURAL = 'products';
    const ENTITY_ROUTE_NAME = 'product';
    const ENTITY_TEMPLATE_NAME = 'product::product-table';

    const ENTITY_FORM_NAME = 'Product';
    const ENTITY_DELETE_FORM_NAME = 'ConfirmDelete';
    const ENTITY_ACTIVATE_FORM_NAME = 'ConfirmActivate';
    const DEFAULT_SORTED_COLUMN = 'dateCreated';

    /**
     * @return HtmlResponse
     */
    public function managePendingAction()
    {
        $listUri = $this->url(static::ENTITY_ROUTE_NAME, ['action' => 'listPending']);
        $addUri = $this->url(static::ENTITY_ROUTE_NAME, ['action' => 'add']);
        $editUri = $this->url(static::ENTITY_ROUTE_NAME, ['action' => 'edit']);
        $deleteUri = $this->url(static::ENTITY_ROUTE_NAME, ['action' => 'delete']);
        $activateUri = $this->url(static::ENTITY_ROUTE_NAME, ['action' => 'activate']);

        return new HtmlResponse(
            $this->template(
                static::ENTITY_TEMPLATE_NAME,
                [
                    'defaultSortedColumn' => static::DEFAULT_SORTED_COLUMN,
                    'listUri' => $listUri,
                    'editUri' => $editUri,
                    'addUri' => $addUri,
                    'deleteUri' => $deleteUri,
                    'activateUri' => $activateUri,
                    'entityNameSingular' => static::ENTITY_NAME_SINGULAR,
                    'entityNamePlural' => static::ENTITY_NAME_PLURAL
                ]
            )
        );
    }

    /**
     * @param array $options
     * @return ResponseInterface
     */
    public function listPendingAction(): ResponseInterface
    {
        //get query params as sent by bootstrap-table
        $params = $this->request->getQueryParams();
        $sort = $params['sort'] ?? '';
        $order = $params['order'] ?? 'asc';

        $search = $params['search'] ?? '';
        $search = trim($search);

        $options = [];
        if (!empty($sort) && !empty($order)) {
            $options['order'] = [$sort => $order];
        }

        if (!empty($search)) {
            $options['search'] = $search;
        }

        if (static::ENTITY_NAME_SINGULAR == "product") {
            $options['conditions'] = [
                'status' => 'pending',
            ];
        }
        
        $limit = (int)($params['limit'] ?? 30);
        $offset = (int)($params['offset'] ?? 0);

        /** @var Paginator $paginator */
        $paginator = $this->service->findAll($options, true);
        $paginator->setItemCountPerPage($limit);
        $paginator->setCurrentPageNumber(intval($offset / $limit) + 1);

        return new JsonResponse([
            'total' => $paginator->getTotalItemCount(),
            'rows' => (array)$paginator->getCurrentItems()
        ]);
    }

    /**
     * @return ResponseInterface
     */
    public function activateAction(): ResponseInterface
    {
        $request = $this->getRequest();
        /** @var Form $form */
        $form = $this->forms(static::ENTITY_ACTIVATE_FORM_NAME);

        if ($request->getMethod() === 'POST') {
            $data = $request->getParsedBody();

            if (isset($data[static::ENTITY_NAME_PLURAL]) && is_array($data[static::ENTITY_NAME_PLURAL])) {
                return new HtmlResponse(
                    $this->template()->render(
                        'partial::confirm-activate',
                        [
                            'form' => $form,
                            'activateUri' => $this->url(static::ENTITY_ROUTE_NAME, ['action' => 'activate']),
                            'entities' => $data[static::ENTITY_NAME_PLURAL]
                        ]
                    )
                );
            } else {
                //used to validate CSRF token
                $form->setData($data);

                if ($form->isValid()) {
                    $ids = isset($data['ids']) && is_array($data['ids']) ? $data['ids'] : [];
                    $confirm = isset($data['confirm']) ? $data['confirm'] : 'no';
//                    $markAsDeleted = isset($data['markAsDeleted']) ? $data['markAsDeleted'] : 'yes';

                    if (!empty($ids) && $confirm === 'yes') {
//                        $markAsDeleted = $markAsDeleted === 'no' ? false : true;

                        try {
                            $result = $this->service->markAsActivated($ids);

                            if ($result) {
                                return $this->generateJsonOutput($this->getEntityActivateSuccessMessage());
                            } else {
                                return $this->generateJsonOutput($this->getEntityActivateNoChangesMessage(), 'info');
                            }
                        } catch (\Exception $e) {
                            $message = $this->getEntityActivateErrorMessage();
                            if ($this->isDebug()) {
                                $message = (array)$e->getMessage();
                            }
                            return $this->generateJsonOutput($message, 'error');
                        }
                    } else {
                        //do nothing
                        return $this->generateJsonOutput($this->getEntityActivateNoChangesMessage(), 'info');
                    }
                } else {
                    return $this->generateJsonOutput($this->forms()->getErrors($form), 'validation', $form);
                }
            }
        }

        //redirect to manage page if trying to access this action via GET
        return new RedirectResponse($this->url(static::ENTITY_ROUTE_NAME, ['action' => 'managePending']));
    }
}
