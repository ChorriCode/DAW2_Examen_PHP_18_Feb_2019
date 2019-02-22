

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>EXAMEN DE LA SEGUNDA EVALUACION 2018 (PHP)</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<h1>EXAMEN FINAL DE PHP</h1>

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
?>

</body>
</html>