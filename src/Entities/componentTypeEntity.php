<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="componentTypeEntity")
 */
class componentTypeEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=45)
     */
    private $bezeichnung;

    /**
     * Returns the id of the componentType Entity
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Returns the name of the componentType Entity
     * @return int
     */
    public function getBezeichnung(): string
    {
        return $this->bezeichnung;
    }

    /**
     * Sets the name of the componentType Entity
     * @param string $bezeichnung
     */
    public function setBezeichnung(string $bezeichnung): void
    {
        $this->bezeichnung = $bezeichnung;
    }


}