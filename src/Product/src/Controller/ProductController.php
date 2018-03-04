<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */
 
declare(strict_types=1);
 
namespace Tracker\Admin\Product\Controller;

use Psr\Http\Message\ResponseInterface;
use Tracker\Admin\Product\Service\ProductService;
use Zend\Diactoros\Response\HtmlResponse;
// Annotation Services
use Dot\AnnotatedServices\Annotation\Service;
use Dot\AnnotatedServices\Annotation\Inject;

/**
 * Class ProductController
 * @package Tracker\Admin\Product\Controller
 *
 * @Service
 */
class ProductController extends ProductBaseManageController
{
    const ENTITY_NAME_SINGULAR = 'product';
    const ENTITY_NAME_PLURAL = 'products';
    const ENTITY_ROUTE_NAME = 'product';
    const ENTITY_TEMPLATE_NAME = 'product::product-table';

    const ENTITY_FORM_NAME = 'Product';
    const ENTITY_DELETE_FORM_NAME = 'ConfirmDelete';
    const DEFAULT_SORTED_COLUMN = 'dateCreated';

    /** @var  ProductService */
    protected $productService;

    /**
     * ProductController constructor
     * @param ProductService $productService
     *
     * @Inject({ProductService::class})
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
        parent::__construct($productService);
    }

    public function testAction(): ResponseInterface
    {
        return new HtmlResponse('Great success!');
    }
}
