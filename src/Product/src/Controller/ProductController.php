<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */
 
declare(strict_types=1);
 
namespace Tracker\Admin\Product\Controller;

use Admin\App\Service\EntityServiceInterface;
use Psr\Http\Message\ResponseInterface;
use Tracker\Admin\Product\Entity\ProductEntity;
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
    /** @var  ProductService */
    protected $productService;

    /**
     * ProductController constructor
     * @param EntityServiceInterface $productService
     *
     * @Inject({ProductService::class})
     */
    public function __construct(EntityServiceInterface $productService)
    {
        $this->productService = $productService;
        parent::__construct($productService);
    }

    /*
     * Function to test different features of the app
     * @return ResponseInterface
     */
    public function testAction(): ResponseInterface
    {
        $arr = [
            'title' => 'test',
            'carbs' => 12,
            'fat' => 5,
        ];

        $fromArray = ProductEntity::fromArray($arr);
        $empty = ProductEntity::emptyProduct();

        return new HtmlResponse('Great success!');
    }

    /**
     * Display pending products list, giving the admin an option to validate (activate) them
     * @return ResponseInterface
     */
    public function pendingAction(): ResponseInterface
    {
        return parent::managePendingAction();
    }
}
