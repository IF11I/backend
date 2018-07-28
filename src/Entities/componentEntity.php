<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use \DateTime;

/**
 * @ORM\Entity
 * @ORM\Table(name="componentEntity")
 */
class componentEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="integer")
     */
    private $raumId;
    /**
     * @ORM\Column(type="integer")
     */
    private $lieferantenId;
    /**
     * @ORM\Column(type="date")
     */
    private $einkaufsdatum;
    /**
     * @ORM\Column(type="date")
     */
    private $gewaehrleistungsende;
    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $notiz;
    /**
     * @ORM\Column(type="string", length=45)
     */
    private $hersteller;
    /**
     * @ORM\Column(type="integer")
     */
    private $komponentenartId;
    /**
     * @ORM\Column(type="string", length=45);
     */
    private $bezeichnung;

    /**
     * Returns the component's Id
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Returns the component's room Id
     * @return int
     */
    public function getRaumId(): int
    {
        return $this->raumId;
    }

    /**
     * @param mixed $raumId
     */
    public function setRaumId($raumId)
    {
        $this->raumId = $raumId;
    }

    /**
     * @return mixed
     */
    public function getLieferantenId()
    {
        return $this->lieferantenId;
    }

    /**
     * @param mixed $lieferantenId
     */
    public function setLieferantenId($lieferantenId)
    {
        $this->lieferantenId = $lieferantenId;
    }

    /**
     * @return mixed
     */
    public function getEinkaufsdatum()
    {
        return $this->einkaufsdatum;
    }

    /**
     * @param mixed $einkaufsdatum
     */
    public function setEinkaufsdatum(string $einkaufsdatum)
    {
        $this->einkaufsdatum = new DateTime($einkaufsdatum);
    }

    /**
     * @return mixed
     */
    public function getGewaehrleistungsende()
    {
        return $this->gewaehrleistungsende;
    }

    /**
     * @param mixed $gewaehrleistungsende
     */
    public function setGewaehrleistungsende($gewaehrleistungsende)
    {
        $this->gewaehrleistungsende = new DateTime($gewaehrleistungsende);
    }

    /**
     * @return mixed
     */
    public function getNotiz()
    {
        return $this->notiz;
    }

    /**
     * @param mixed $notiz
     */
    public function setNotiz($notiz)
    {
        $this->notiz = $notiz;
    }

    /**
     * @return mixed
     */
    public function getHersteller()
    {
        return $this->hersteller;
    }

    /**
     * @param mixed $hersteller
     */
    public function setHersteller($hersteller)
    {
        $this->hersteller = $hersteller;
    }

    /**
     * @return mixed
     */
    public function getKomponentenartId()
    {
        return $this->komponentenartId;
    }

    /**
     * @param mixed $komponentenartId
     */
    public function setKomponentenartId($komponentenartId)
    {
        $this->komponentenartId = $komponentenartId;
    }

    /**
     * Returns the components name
     * @return string
     */
    public function getBezeichnung(): string
    {
        return $this->bezeichnung;
    }

    /**
     * Sets the components name
     * @param string $bezeichnung
     */
    public function setBezeichnung(string $bezeichnung)
    {
        $this->bezeichnung = $bezeichnung;
    }

}