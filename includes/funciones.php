<?php

use modelo\Equipo;

require "../includes/bd.php";
require "../modelo/Equipo.php";
function crearBaseDatos()
{
    $db = new DB();
    $conn = $db->getConexionPDO();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = file_get_contents("../datos/backupSinDatos.sql");
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "Base datos creadas con las tablas vacias...";
}
// OBJETIVO 1
function cargarTablaEquipos($fich)
{
// completar codigo borrado
    echo "Tabla equipos creada y cargada ...";
}
// OBJETIVO 2
function cargarTablaPartidos($fich)
{

   // completar código omitido
    echo "Tabla partidos creada y cargada ...";
}
// OBJETIVO 3.1
function cargaEquipos()
{
    $db = new DB();
    $conn = $db->getConexionPDO();
    if ($conn->errorCode() != 0)
        die("Ooops...db error");
    $equipos = array();
    $sql = "SELECT * FROM `equipos`";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute();
    $results = $sentencia->fetchAll(PDO::FETCH_ASSOC);

    // recorre $results, creando el asociativo con los valores a cero (puntos, etc..)
    // usa la clase Equipo


    return $equipos;
}
// OBJETIVO 3.2
function creaClasificacion()
{
    $db = new DB();
    $conn = $db->getConexionPDO();
    if ($conn->errorCode() != 0)
        die("Ooops...db error");

    $sql = "SELECT * FROM `partidos`";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute();
    $results = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $equipos = cargaEquipos();



    // recorrer $results actualizando puntos, goles, partidos del equipo local  y visitante
    // según haya sido el resultado(compara goles local y visitante), hay tres casos.


    return $equipos;
}
// la función que recibe el asociativo anterior y lo ordena por puntos...
function ordenaPorPuntos($e)
{
    $puntos = array();
    foreach ($e as $key => $row) {
        $puntos[$key] = $row->getPuntos();
    }

    array_multisort($puntos, SORT_DESC, $e);
    return $e;
}

function muestra_Clasificacion($equipos)
{
// recorrer el asociativo y mostrar su contenido en una tabla HTML

}

