<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="componentAttributesEntity")
 */
class componentAttributesEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=25)
     */
    private $bezeichnung;

    /**
     * Returns the componentAttributes Id
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Returns the componentAttributes name
     * @return string
     */
    public function getBezeichnung(): string
    {
        return $this->bezeichnung;
    }

    /**
     * Sets the componentAttributes name
     * @param string $bezeichnung
     */
    public function setBezeichnung(string $bezeichnung): void
    {
        $this->bezeichnung = $bezeichnung;
    }
}