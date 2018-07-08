<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */

declare(strict_types=1);

namespace Tracker\Admin\Recipe;

use Dot\Mapper\Factory\DbMapperFactory;
use Tracker\Admin\Recipe\Entity\RecipeEntity;
use Tracker\Admin\Recipe\Mapper\RecipeDbMapper;

/**
 * Class ConfigProvider
 * @package Tracker\Admin\Recipe
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

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getMappers(): array
    {
        return [
            'mapper_manager' => [
                'factories' => [
                    RecipeDbMapper::class => DbMapperFactory::class,
                ],
                'aliases' => [
                    RecipeEntity::class => RecipeDbMapper::class,
                ]
            ],
        ];
    }

    /**
     * @return array
     */
    public function getForms(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getTemplates(): array
    {
        return [];
    }
}
