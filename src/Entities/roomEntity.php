<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="roomEntity")
 */
class roomEntity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="raumnr", length=20)
     */
    private $nr;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $bezeichnung;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $notiz;

    /**
     * Return the room ID
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Returns the room Number
     * @return mixed
     */
    public function getNr(): string {
        return $this->nr;
    }

    /**
     * Sets the room Number
     * @param string $nr
     */
    public function setNr(string $nr) {
        $this->nr = $nr;
    }

    /**
     * Returns the room Name
     * @return mixed
     */
    public function getBezeichnung(): string
    {
        return $this->bezeichnung;
    }

    /**
     * Sets the room name
     * @param string $name
     */
    public function setBezeichnung(string $name) {
        $this->bezeichnung = $name;
    }

    /**
     * Returns the room Note
     * @return mixed
     */
    public function getNotiz(): string
    {
        return $this->notiz;
    }

    /**
     * Setts the room Note
     * @param mixed $notiz
     */
    public function setNotiz($notiz)
    {
        $this->notiz = $notiz;
    }
}
