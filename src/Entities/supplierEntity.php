<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="supplierEntity")
 */
class supplierEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", name="name", length=45)
     */
    private $name;

    /**
     * @ORM\Column(type="string", name="strasse", length=45)
     */
    private $strasse;

    /**
     * @ORM\Column(type="string", name="plz", length=5)
     */
    private $plz;
    /**
     * @ORM\Column(type="string", name="ort", length=45)
     */
    private $ort;
    /**
     * @ORM\Column(type="string", name="telefon", length=20)
     */
    private $telefon;
    /**
     * @ORM\Column(type="string", name="mobil", length=20)
     */
    private $mobil;
    /**
     * @ORM\Column(type="string", name="fax", length=20)
     */
    private $fax;
    /**
     * @ORM\Column(type="string", name="email", length=45)
     */
    private $mail;

    /**
     * Returns the supplier's id
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Returns the supplier's name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the supplier's name
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the supplier's street
     * @return string
     */
    public function getStrasse(): string
    {
        return $this->strasse;
    }

    /**
     * Sets the supplier's street
     * @param string $strasse
     */
    public function setStrasse(string $strasse)
    {
        $this->strasse = $strasse;
    }

    /**
     * Returns the supplier's zip-code
     * @return string
     */
    public function getPlz(): string
    {
        return $this->plz;
    }

    /**
     * Sets the supplier's zip-code
     * @param string $plz
     */
    public function setPlz(string $plz)
    {
        $this->plz = $plz;
    }

    /**
     * Returns the supplier's city
     * @return string
     */
    public function getOrt(): string
    {
        return $this->ort;
    }

    /**
     * Sets the supplier's city
     * @param string $ort
     */
    public function setOrt(string $ort)
    {
        $this->ort = $ort;
    }

    /**
     * Returns the supplier's phone number
     * @return string
     */
    public function getTelefon(): string
    {
        return $this->telefon;
    }

    /**
     * Sets the supplier's phone number
     * @param string $telefon
     */
    public function setTelefon(string $telefon)
    {
        $this->telefon = $telefon;
    }

    /**
     * Returns the supplier's mobile number
     * @return string
     */
    public function getMobil(): string
    {
        return $this->mobil;
    }

    /**
     * Sets the supplier*s mobile number
     * @param string $mobil
     */
    public function setMobil(string $mobil)
    {
        $this->mobil = $mobil;
    }

    /**
     * Returns the supplier's fax number
     * @return string
     */
    public function getFax(): string
    {
        return $this->fax;
    }

    /**
     * Sets the supplier's fax number
     * @param string $fax
     */
    public function setFax(string $fax)
    {
        $this->fax = $fax;
    }

    /**
     * Returns the supplier's mail address
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * Sets the supplier*s mail address
     * @param string $mail
     */
    public function setMail(string $mail)
    {
        $this->mail = $mail;
    }

}