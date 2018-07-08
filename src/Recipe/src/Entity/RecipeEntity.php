<?php
/**
 * @see https://github.com/dotkernel/frontend/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/frontend/blob/master/LICENSE.md MIT License
 */
 
declare(strict_types=1);
 
namespace Tracker\Admin\Recipe\Entity;

use Dot\Mapper\Entity\Entity;

/**
 * Class ProductEntity
 * @package Tracker\Admin\Recipe\Entity
 */
class RecipeEntity extends Entity implements \JsonSerializable
{
    /** @var  int */
    protected $id;

    /** @var  int */
    protected $userId;

    /** @var  string */
    protected $name;

    /** @var  string */
    protected $dateCreated;

    /** @var  string */
    protected $dateUpdated;

    /** @var string */
    protected $status;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return RecipeEntity
     */
    public function setId(int $id): RecipeEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return RecipeEntity
     */
    public function setUserId(int $userId): RecipeEntity
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return RecipeEntity
     */
    public function setName(string $name): RecipeEntity
    {
        $this->name = $name;
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
     * @return RecipeEntity
     */
    public function setDateCreated(string $dateCreated): RecipeEntity
    {
        $this->dateCreated = $dateCreated;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateUpdated(): string
    {
        return $this->dateUpdated;
    }

    /**
     * @param string $dateUpdated
     * @return RecipeEntity
     */
    public function setDateUpdated(string $dateUpdated): RecipeEntity
    {
        $this->dateUpdated = $dateUpdated;
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
     * @return RecipeEntity
     */
    public function setStatus(string $status): RecipeEntity
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
            'id' => $this->getId(),
            'userId' => $this->getUserId(),
            'name' => $this->getName(),
            'dateCreated' => $this->getDateCreated(),
            'dateUpdated' => $this->getDateUpdated(),
            'status' => $this->getStatus(),
        ];
    }
}
