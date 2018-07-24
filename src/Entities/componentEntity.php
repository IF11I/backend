<?php

namespace Entities;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string")
     */
    private $komponentenartId;

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
    public function setRaumId($raumId): void
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
    public function setLieferantenId($lieferantenId): void
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
    public function setEinkaufsdatum($einkaufsdatum): void
    {
        $this->einkaufsdatum = $einkaufsdatum;
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
    public function setGewaehrleistungsende($gewaehrleistungsende): void
    {
        $this->gewaehrleistungsende = $gewaehrleistungsende;
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
    public function setNotiz($notiz): void
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
    public function setHersteller($hersteller): void
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
    public function setKomponentenartId($komponentenartId): void
    {
        $this->komponentenartId = $komponentenartId;
    }



}