<?php
/**
 * Created by PhpStorm.
 * User: JOSE MAURICIO
 * Date: 13/02/2019
 * Time: 17:00
 */

namespace modelo;


class Equipo
{
    private $id;
    private $nombreCorto;
    private $nombre;
    private $puntos;
    private $pg;
    private $pe;
    private $pp;
    private $gf;
    private $gc;

    /**
     * Equipo constructor.
     * @param $id
     */
    public function __construct()
    {

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
    public function getNombreCorto()
    {
        return $this->nombreCorto;
    }

    /**
     * @param mixed $nombreCorto
     */
    public function setNombreCorto($nombreCorto)
    {
        $this->nombreCorto = $nombreCorto;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getPg()
    {
        return $this->pg;
    }

    /**
     * @param mixed $pg
     */
    public function setPg($pg)
    {
        $this->pg = $pg;
    }

    /**
     * @return mixed
     */
    public function getPe()
    {
        return $this->pe;
    }

    /**
     * @param mixed $pe
     */
    public function setPe($pe)
    {
        $this->pe = $pe;
    }

    /**
     * @return mixed
     */
    public function getPp()
    {
        return $this->pp;
    }

    /**
     * @param mixed $pp
     */
    public function setPp($pp)
    {
        $this->pp = $pp;
    }

    /**
     * @return mixed
     */
    public function getGf()
    {
        return $this->gf;
    }

    /**
     * @param mixed $gf
     */
    public function setGf($gf)
    {
        $this->gf = $gf;
    }

    /**
     * @return mixed
     */
    public function getGc()
    {
        return $this->gc;
    }

    /**
     * @param mixed $gc
     */
    public function setGc($gc)
    {
        $this->gc = $gc;
    }

    /**
     * @return mixed
     */
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * @param mixed $puntos
     */
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;
    }

}