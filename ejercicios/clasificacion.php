<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EXAMEN DE LA SEGUNDA EVALUACION 2018 (PHP)</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<section>
    <h2 class="comment"><img class="logo" src='../LogoLigaFutbol.png'>Clasificación Equipos Fútbol Liga Española 2018-2019</h2>
</section>

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
    muestra_Clasificacion($clasificacion);
else {

    echo "<pre>";
    var_dump($clasificacion);
    echo "</pre>";

}
?>
</body>
</html>
