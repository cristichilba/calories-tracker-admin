<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */
 
declare(strict_types=1);
 
namespace Tracker\Admin\Product;

use Dot\Mapper\Factory\DbMapperFactory;
use Tracker\Admin\Product\Entity\ProductEntity;
use Tracker\Admin\Product\Form\ProductFieldset;
use Tracker\Admin\Product\Form\ProductForm;
use Tracker\Admin\Product\Mapper\ProductDbMapper;
use Zend\ServiceManager\Factory\InvokableFactory;

/**
 * Class ConfigProvider
 * @package Tracker\Admin\Product\Controller
 */
class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'dot_mapper' => $this->getMappers(),
            'dot_form' => $this->getForms(),
            'templates' => $this->getTemplates(),
        ];
    }

    public function getDependencies(): array
    {
        return [

        ];
    }

    public function getMappers()
    {
        return [
            'mapper_manager' => [
                'factories' => [
                    ProductDbMapper::class => DbMapperFactory::class,
                ],
                'aliases' => [
                    ProductEntity::class => ProductDbMapper::class,
                ]
            ],
        ];
    }

    public function getForms(): array
    {
        return [
            'form_manager' => [
                'factories' => [
                    ProductFieldset::class => InvokableFactory::class,
                    ProductForm::class     => InvokableFactory::class,
                ],
                'aliases' => [
                    'ProductFieldset' => ProductFieldset::class,
                    'Product' => ProductForm::class,
                ]
            ]
        ];
    }
    public function getTemplates(): array
    {
        return [
            'paths' => [
                'error' => [__DIR__ . '/../templates/error'],
                'layout' => [__DIR__ . '/../templates/layout'],
                'partial' => [__DIR__ . '/../templates/partial'],
                'product' => [__DIR__ . '/../templates/product']
            ]
        ];
    }
}
