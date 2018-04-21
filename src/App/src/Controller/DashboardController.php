<?php
/**
 * @see https://github.com/dotkernel/admin/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/admin/blob/master/LICENSE.md MIT License
 */

namespace Admin\App\Controller;

use Admin\App\Service\EntityServiceInterface;
use Admin\User\Service\UserService;
use Dot\AnnotatedServices\Annotation\Service;
use Dot\AnnotatedServices\Annotation\Inject;
use Dot\Controller\AbstractActionController;
use Dot\Controller\Plugin\Authentication\AuthenticationPlugin;
use Dot\Controller\Plugin\Authorization\AuthorizationPlugin;
use Dot\Controller\Plugin\FlashMessenger\FlashMessengerPlugin;
use Dot\Controller\Plugin\Forms\FormsPlugin;
use Dot\Controller\Plugin\TemplatePlugin;
use Dot\Controller\Plugin\UrlHelperPlugin;
use Psr\Http\Message\UriInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Form\Form;
use Zend\Session\Container;
use Tracker\Admin\Product\Service\ProductService;

/**
 * Class DashboardController
 * @package Admin\App\Controller
 *
 * @method UrlHelperPlugin|UriInterface url($r = null, $p = [], $q = [], $f = null, $o = [])
 * @method FlashMessengerPlugin messenger()
 * @method FormsPlugin|Form forms(string $name = null)
 * @method TemplatePlugin|string template(string $template = null, array $params = [])
 * @method AuthenticationPlugin authentication()
 * @method AuthorizationPlugin isGranted(string $permission, array $roles = [], $context = null)
 * @method Container session(string $namespace)
 *
 * @Service
 */
class DashboardController extends AbstractActionController
{
    /** @var  UserService */
    protected $userService;

    /** @var ProductService */
    protected $productService;

    /**
     * DashboardController constructor.
     * @param EntityServiceInterface $userService
     * @param EntityServiceInterface $productService
     * @Inject ({UserService::class, ProductService::class})
     */
    public function __construct(
        EntityServiceInterface $userService,
        EntityServiceInterface $productService
    ) {
        $this->userService = $userService;
        $this->productService = $productService;
    }

    /**
     * @return HtmlResponse|RedirectResponse
     */
    public function indexAction()
    {
        $data['userCount'] = count($this->userService->findAll());
        $data['productCount'] = count($this->productService->findAll());
        return new HtmlResponse($this->template('app::dashboard', $data));
    }
}
