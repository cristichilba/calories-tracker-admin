<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */
 
declare(strict_types=1);
 
namespace Tracker\Admin\Product\Service;

use Admin\App\Service\AbstractEntityService;
use Tracker\Admin\Product\Entity\ProductEntity;
// Annotation Services
use Dot\AnnotatedServices\Annotation\Service;
use Dot\AnnotatedServices\Annotation\Inject;

/**
 * Class ProductService
 * @package Tracker\Admin\Product\Service
 *
 * @Service
 */
class ProductService extends AbstractEntityService
{
    /** @var  string */
    protected $entityClass = ProductEntity::class;

    /** @var array */
    protected $searchableColumns = [
        'title',
    ];

    /**
     * @param ProductEntity $entity
     * @param array $options
     * @return ProductEntity
     */
    public function save($entity, array $options = [])
    {
        if (!$entity instanceof ProductEntity) {
            throw new InvalidArgumentException('ProductService can save only instances of ProductEntity');
        }

        return parent::save($entity);
    }
}
