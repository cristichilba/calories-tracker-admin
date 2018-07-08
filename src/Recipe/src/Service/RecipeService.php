<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */
 
declare(strict_types=1);
 
namespace Tracker\Admin\Recipe\Service;

use Admin\App\Service\AbstractEntityService;
use Tracker\Admin\Product\Entity\ProductEntity;
// Annotation Services
use Dot\AnnotatedServices\Annotation\Service;
use Dot\AnnotatedServices\Annotation\Inject;
use Tracker\Admin\Recipe\Entity\RecipeEntity;

/**
 * Class ProductService
 * @package Tracker\Admin\Recipe\Service
 *
 * @Service
 */
class RecipeService extends AbstractEntityService
{
    /** @var  string */
    protected $entityClass = RecipeEntity::class;

    /** @var array */
    protected $searchableColumns = [
        'title',
    ];
}
