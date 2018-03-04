<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */
 
declare(strict_types=1);
 
namespace Tracker\Admin\Product\Entity;

use Dot\Mapper\Entity\Entity;

/**
 * Class ProductEntity
 * @package Tracker\Admin\Product\Entity
 */
class ProductEntity extends Entity implements \JsonSerializable
{
    /** @var  string */
    protected $title;

    /** @var  float */
    protected $carbs;

    /** @var  float */
    protected $protein;

    /** @var  float */
    protected $fat;

    /** @var  string */
    protected $dateCreated;

    /** @var string */
    protected $status;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ProductEntity
     */
    public function setTitle(string $title): ProductEntity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return float
     */
    public function getCarbs(): float
    {
        return $this->carbs;
    }

    /**
     * @param float $carbs
     * @return ProductEntity
     */
    public function setCarbs(float $carbs): ProductEntity
    {
        $this->carbs = $carbs;
        return $this;
    }

    /**
     * @return float
     */
    public function getProtein(): float
    {
        return $this->protein;
    }

    /**
     * @param float $protein
     * @return ProductEntity
     */
    public function setProtein(float $protein): ProductEntity
    {
        $this->protein = $protein;
        return $this;
    }

    /**
     * @return float
     */
    public function getFat(): float
    {
        return $this->fat;
    }

    /**
     * @param float $fat
     * @return ProductEntity
     */
    public function setFat(float $fat): ProductEntity
    {
        $this->fat = $fat;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateCreated(): string
    {
        return $this->dateCreated;
    }

    /**
     * @param string $dateCreated
     * @return ProductEntity
     */
    public function setDateCreated(string $dateCreated): ProductEntity
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return ProductEntity
     */
    public function setStatus(string $status): ProductEntity
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'title' => $this->getTitle(),
            'carbs' => $this->getCarbs(),
            'protein' => $this->getProtein(),
            'fat' => $this->getFat(),
            'dateCreated' => $this->getDateCreated(),
            'status' => $this->getStatus(),
        ];
    }
}
