<?php
/**
 * Created by PhpStorm.
 * User: JOSE MAURICIO
 * Date: 13/02/2019
 * Time: 18:22
 */
require "../includes/funciones.php";
$clasificacion = creaClasificacion();
//$x = ordenaPorPuntos($clasificacion);

if (isset ($_GET['opc']) && $_GET['opc'] == "mostrar")
    muestra_Clasificacion($x);
else {

    echo "<pre>";
    var_dump($clasificacion);
    echo "</pre>";

}