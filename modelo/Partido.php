<?php
/**
 * Created by PhpStorm.
 * User: JOSE MAURICIO
 * Date: 13/02/2019
 * Time: 17:00
 */

namespace modelo;


class Partido
{
    private $id;
    private $jornada;
    private $eL;
    private $gL;
    private $eV;
    private $gV;
    /**
     * Partido constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getJornada()
    {
        return $this->jornada;
    }

    /**
     * @param mixed $jornada
     */
    public function setJornada($jornada)
    {
        $this->jornada = $jornada;
    }

    /**
     * @return mixed
     */
    public function getEL()
    {
        return $this->eL;
    }

    /**
     * @param mixed $eL
     */
    public function setEL($eL)
    {
        $this->eL = $eL;
    }

    /**
     * @return mixed
     */
    public function getGL()
    {
        return $this->gL;
    }

    /**
     * @param mixed $gL
     */
    public function setGL($gL)
    {
        $this->gL = $gL;
    }

    /**
     * @return mixed
     */
    public function getEV()
    {
        return $this->eV;
    }

    /**
     * @param mixed $eV
     */
    public function setEV($eV)
    {
        $this->eV = $eV;
    }

    /**
     * @return mixed
     */
    public function getGV()
    {
        return $this->gV;
    }

    /**
     * @param mixed $gV
     */
    public function setGV($gV)
    {
        $this->gV = $gV;
    }


}