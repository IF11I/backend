<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="componenthasattributesEntity")
 */
class componentHasAttributesEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $komponentenId;
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $attributId;
    /**
     * @ORM\Column(type="string", length=45)
     */
    private $wert;

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getKomponentenId(): int
    {
        return $this->komponentenId;
    }

    /**
     * @param mixed $komponentenId
     */
    public function setKomponentenId($komponentenId)
    {
        $this->komponentenId = $komponentenId;
    }

    /**
     * @return mixed
     */
    public function getAttributId(): int
    {
        return $this->attributId;
    }

    /**
     * @param mixed $attributId
     */
    public function setAttributId($attributId)
    {
        $this->attributId = $attributId;
    }

    /**
     * @return mixed
     */
    public function getWert(): string
    {
        return $this->wert;
    }

    /**
     * @param mixed $wert
     */
    public function setWert($wert)
    {
        $this->wert = $wert;
    }
}