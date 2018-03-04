<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */
 
declare(strict_types=1);
 
namespace Tracker\Admin\Product;

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

        ];
    }

    public function getForms(): array
    {
        return [

        ];
    }
    public function getTemplates(): array
    {
        return [

        ];
    }
}
