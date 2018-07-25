<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="componentTypeAttributesEntity")
 */
class componentTypeAttributesEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $componentTypeId;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $attributeId;

    /**
     * Returns the componentType id
     * @return int
     */
    public function getComponentTypeId(): int
    {
        return $this->componentTypeId;
    }

    /**
     * Sets the componentType id
     * @param int $componentTypeId
     */
    public function setComponentTypeId(int $componentTypeId): void
    {
        $this->componentTypeId = $componentTypeId;
    }

    /**
     * Returns the componentTypes attribute id
     * @return int
     */
    public function getAttributeId(): int
    {
        return $this->attributeId;
    }

    /**
     * Sets the componentTypes attribute id
     * @param integer $attributeId
     */
    public function setAttributeId(int $attributeId): void
    {
        $this->attributeId = $attributeId;
    }
}