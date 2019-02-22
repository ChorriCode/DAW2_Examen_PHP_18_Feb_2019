<?php
/**
 * Created by PhpStorm.
 * User: JOSE MAURICIO
 * Date: 13/02/2019
 * Time: 18:16
 */
require "../includes/funciones.php";
if ($_GET['t'] == "e")
    cargarTablaEquipos("../datos/equipos.txt");
elseif ($_GET['t'] == "p")
    cargarTablaPartidos("../datos/partidos.txt");
elseif ($_GET['t'] == "bd")
    crearBaseDatos();