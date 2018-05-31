<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */
 
declare(strict_types=1);
 
namespace Tracker\Admin\Product\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;

/**
 * Class ProductForm
 * @package Tracker\Admin\Product\Form
 */
class ProductForm extends Form
{
    protected $validationGroup = [
        'product' => [
            'title',
            'carbs',
            'protein',
            'fat',
            'status'
        ]
    ];

    /**
     * ProductForm constructor.
     */
    public function __construct()
    {
        parent::__construct('productForm');

        $this->setAttribute('method', 'product');
        $this->setInputFilter(new InputFilter());
    }

    public function init()
    {
        $this->add([
            'type' => 'ProductFieldset',
            'options' => [
                'use_as_base_fieldset' => true,
            ]
        ]);

        $this->setValidationGroup($this->validationGroup);
    }
}
