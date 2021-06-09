<?php

namespace App\Entity;
class AccueilSearch{


    private $lieu;
    private $typeBien;
    private $minSurface;
    private $maxprice;

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu): void
    {
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getTypeBien()
    {
        return $this->typeBien;
    }

    /**
     * @param mixed $typeBien
     */
    public function setTypeBien($typeBien): void
    {
        $this->typeBien = $typeBien;
    }

    /**
     * @return mixed
     */
    public function getMinSurface()
    {
        return $this->minSurface;
    }

    /**
     * @param mixed $minSurface
     */
    public function setMinSurface($minSurface): void
    {
        $this->minSurface = $minSurface;
    }

    /**
     * @return mixed
     */
    public function getMaxprice()
    {
        return $this->maxprice;
    }

    /**
     * @param mixed $maxprice
     */
    public function setMaxprice($maxprice): void
    {
        $this->maxprice = $maxprice;
    }






}