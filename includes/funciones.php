<?php

use modelo\Equipo;
use modelo\Partido;
require "../includes/bd.php";
require "../modelo/Equipo.php";
require "../modelo/Partido.php";

function crearBaseDatos() {
    $db = new DB();
    $conn = $db->getConexionPDO();
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = file_get_contents("../datos/backupSinDatos.sql");
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    echo "Base datos creadas con las tablas vacias...";
}




// OBJETIVO 1
function cargarTablaEquipos($filePath) {

        $arrayTeams = array();

        if (!file_exists($filePath)) {
            echo "File not found " . $filePath;
            die();
        }
        // debe haber un CR/LF al final ...
        $result = fopen($filePath, 'r');
        while (($registry = fgets($result)) && !feof($result)) {
            $arrayDataOneResgitry = explode("#", $registry);
            $idTeam = $arrayDataOneResgitry[0];
            $shortTeamName = $arrayDataOneResgitry[1];
            $largeTeamName = $arrayDataOneResgitry[2];
            $oneTeam = new Equipo();
            $oneTeam->setId($idTeam);
            $oneTeam->setPuntos(0);
            $oneTeam->setNombreCorto($shortTeamName);
            $oneTeam->setNombre($largeTeamName);
            $oneTeam->setPg(0);
            $oneTeam->setPe(0);
            $oneTeam->setPp(0);
            $oneTeam->setGf(0);
            $oneTeam->setGc(0);
            $arrayTeams[$idTeam] = $oneTeam;
        }
        fclose($result);
        echo "<pre>";
        insertTeamsTableDB($arrayTeams);
            echo "<a href='../index.php'> Regresar al menú anterior</a><br>";
            var_dump($arrayTeams);
        echo "</pre>";
        return $arrayTeams;

}
// OBJETIVO 2
function cargarTablaPartidos($filePath) {
    $arrayMatches = array();

    if (!file_exists($filePath)) {
        echo "File not found " . $filePath;
        die();
    }
    // debe haber un CR/LF al final ...
    $result = fopen($filePath, 'r');
    while (($registry = fgets($result)) && !feof($result)) {
        $arrayDataOneResgitry = explode("#", $registry);
        $idMatch = intval($arrayDataOneResgitry[0]);
        $idWeeklyMatches = intval($arrayDataOneResgitry[1]);
        $localTeamShortName = $arrayDataOneResgitry[2];
        $visitTeamShortName = $arrayDataOneResgitry[4];
        // comprueba si los goles del equipo local son "" es que el partido no se ha jugado y devolvemos menos un gol a cada equipo
        if ($arrayDataOneResgitry[3] === "") {
            $localTeamGoals = -1;
            $visitTeamGoals = -1;
        } else {
            $localTeamGoals = intval($arrayDataOneResgitry[3]);
            $visitTeamGoals = intval($arrayDataOneResgitry[5]);
        }
        $oneMatch = new Partido($idMatch);
        $oneMatch->setJornada($idWeeklyMatches);
        $oneMatch->setEL($localTeamShortName);
        $oneMatch->setGL($localTeamGoals);
        $oneMatch->setEV($visitTeamShortName);
        $oneMatch->setGV($visitTeamGoals);
        $arrayMatches[$idMatch] = $oneMatch;
    }
    fclose($result);
    echo "<pre>";
    insertMatchesTableDB($arrayMatches);
    echo "<a href='../index.php'> Regresar al menú anterior</a><br>";
    var_dump($arrayMatches);
    echo "</pre>";

    return $arrayMatches;
}

/*  FUNCIONES PARA CREAR LAS TABLAS NECESARIAS  */

function isExistDataBaseName($dataBaseName, $pdoConn = null) {
    $sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dataBaseName';";
    try {
        if (!isset($pdoConn)) {
            $db= new DB();
            $pdoConnection = $db->getConexionPDOsinDB();

        } else {
            $pdoConnection = $pdoConn;
        }
        $prepareQuery = $pdoConnection->prepare($sql);
        $prepareQuery->execute();
        $result = $prepareQuery->fetchAll();
    } catch(Exception $e) {
        echo '<hr>Reading Error: (' . $e->getMessage() .')';
        return false;
    }
    $pdoConnection = null;
    //devuelve true o false dependiendo si encontró la base de datos
    return $result;
}

function createTeamsTableDB() {
    $sql = "";
    if (!isExistDataBaseName("bdfinalphp")) {
        //$sql = "CREATE DATABASE $dataBaseName; ";
        $sql = "DROP DATABASE IF  EXISTS `bdfinalphp` ; CREATE DATABASE IF NOT EXISTS `bdfinalphp` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;";

    }
    $sql .= "USE `bdfinalphp`; ";
    $sql .= "drop table IF exists `equipos`;" .
        "CREATE TABLE IF NOT EXISTS `equipos` (" .
        "  `id` mediumint NOT NULL AUTO_INCREMENT," .
        "  `nombreCorto` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0'," .
        "  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0'," .
        "  `puntos` tinyint(4) NOT NULL DEFAULT '0'," .
        "  `pg` tinyint(4) NOT NULL DEFAULT '0'," .
        "  `pe` tinyint(4) NOT NULL DEFAULT '0'," .
        "  `pp` tinyint(4) NOT NULL DEFAULT '0'," .
        "  `gf` tinyint(4) NOT NULL DEFAULT '0'," .
        "  `gc` tinyint(4) NOT NULL DEFAULT '0'," .
        "  PRIMARY KEY (`id`)" .
        ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;" ;

    try {
        $db= new DB();
        $conn = $db->getConexionPDOsinDB();
        $wellDone = $conn->exec($sql);
        if ($wellDone !== false) {
            echo "Table Equipos is created successfully!<br/>";
        } else {
            echo "Error creating the Esquipos table.<br/>";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        $conn = null;
    }
    return $sql;
}

function insertTeamsTableDB($arrayObjectsTeams) {
    $sql = "USE `bdfinalphp`; ";
    $sql .= "INSERT INTO `equipos`  VALUES  ";
    createTeamsTableDB();

    for ($i = 1 ; $i <= sizeof($arrayObjectsTeams) ; $i++) {
        $oneTeam = $arrayObjectsTeams[$i];
        $sql .= "(" . $oneTeam->getId() . ",'" . $oneTeam->getNombreCorto() . "','" . $oneTeam->getNombre();
        $sql .= "'," . $oneTeam->getPuntos() . "," . $oneTeam->getGf() . "," . $oneTeam->getGc() . "," . $oneTeam->getPg();
        $sql .= "," . $oneTeam->getPe() . "," . $oneTeam->getPp() . ")";
        //mientras insertamos datos separamos con coma, al final cerramos con ;
        $sql .= ($i < sizeof($arrayObjectsTeams)) ? "," : ";";
    }

    try {
        $db= new DB();
        $pdoConnection = $db->getConexionPDOsinDB();
        $prepareQuery = $pdoConnection->prepare($sql);
        $wellDone = $prepareQuery->execute();

        if ($wellDone !== false) {
            echo "Table equipos is created successfully! and Datas inserted<br/>";
        } else {
            echo "Error creating the equipos table or inserting Datas.<br/>";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        $pdoConnection = null;
    }

}


function updateTeamsTableDB($arrayObjectsTeams) {
    $sql = "USE `bdfinalphp`; ";
    $sql .= "INSERT INTO `equipos`  VALUES  ";
    createTeamsTableDB();


    foreach ($arrayObjectsTeams as $shorTeamName => $oneTeam) {
        $sql .= "(" . $oneTeam->getId() . ",'" . $oneTeam->getNombreCorto() . "','" . $oneTeam->getNombre();
        $sql .= "'," . $oneTeam->getPuntos() . "," . $oneTeam->getGf() . "," . $oneTeam->getGc() . "," . $oneTeam->getPg();
        $sql .= "," . $oneTeam->getPe() . "," . $oneTeam->getPp() . ")";
        //mientras insertamos datos separamos con coma, al final cerramos con ;
        $lastElement = end($arrayObjectsTeams);
        $sql .= ($lastElement->getNombreCorto() == $oneTeam->getNombreCorto()) ? ";" : ",";
    }

    try {
        $db= new DB();
        $pdoConnection = $db->getConexionPDO();
        $prepareQuery = $pdoConnection->prepare($sql);
        $wellDone = $prepareQuery->execute();

        if ($wellDone !== false) {
            echo "Table equipos is created successfully! and Datas inserted<br/>";
        } else {
            echo "Error creating the equipos table or inserting Datas.<br/>";
        }

    } catch (PDOException $e) {
        echo '<hr>Reading Error4: (' . $e->getMessage() .')';
    } finally {
        $pdoConnection = null;
    }

}


function createMatchesTableDB() {
    $sql = "";
    if (!isExistDataBaseName("bdfinalphp")) {
        //$sql = "CREATE DATABASE $dataBaseName; ";
        $sql = "DROP DATABASE IF  EXISTS `bdfinalphp` ; CREATE DATABASE IF NOT EXISTS `bdfinalphp` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;";

    }
    $sql .= "USE `bdfinalphp`; ";

    $sql .= "drop table IF exists `partidos`;" .
        "CREATE TABLE IF NOT EXISTS `partidos` (" .
        "  `id` mediumint NOT NULL AUTO_INCREMENT," .
        "  `jornada` tinyint(4) NOT NULL DEFAULT '0'," .
        "  `eL` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0'," .
        "  `gL` tinyint(4) NOT NULL DEFAULT '0'," .
        "  `eV` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0'," .
        "  `gV` tinyint(4) NOT NULL DEFAULT '0'," .
        "  PRIMARY KEY (`id`)" .
        ") ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;";

    try {
        $db= new DB();
        $conn = $db->getConexionPDOsinDB();
        $wellDone = $conn->exec($sql);
        if ($wellDone !== false) {
            echo "Table partidos is created successfully!<br/>";
        } else {
            echo "Error creating the partidos table.<br/>";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        $conn = null;
    }
    return $sql;
}

function insertMatchesTableDB($arrayObjectsMatches) {
    $sql = "USE `bdfinalphp`; ";
    $sql .= "INSERT INTO `partidos`  VALUES  ";
    createMatchesTableDB();

    for ($i = 1 ; $i <= sizeof($arrayObjectsMatches) ; $i++) {
        $oneMatch = $arrayObjectsMatches[$i];
        $sql .= "(" . $oneMatch->getId() . "," . $oneMatch->getJornada() . ",'" . $oneMatch->getEL();
        $sql .= "'," . $oneMatch->getGL() . ",'" . $oneMatch->getEV() . "'," . $oneMatch->getGV() . ")";

        //mientras insertamos datos separamos con coma, al final cerramos con ;
        $sql .= ($i < sizeof($arrayObjectsMatches)) ? "," : ";";
    }

    try {
        $db= new DB();
        $pdoConnection = $db->getConexionPDOsinDB();
        $prepareQuery = $pdoConnection->prepare($sql);
        $wellDone = $prepareQuery->execute();

        if ($wellDone !== false) {
            echo "Datas of Table partidos is inserted successfully!<br/>";
        } else {
            echo "Error creating the partidos table or inserting Datas.<br/>";
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        $pdoConnection = null;
    }

}


// OBJETIVO 3.1
function cargaEquipos()
{
    $db = new DB();
    $conn = $db->getConexionPDO();
    if ($conn->errorCode() != 0)
        die("Ooops...db error");
    //$equipos = array();
    $sql = "SELECT * FROM `equipos`";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute();
    $equipos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $equipos = convertTableToArrayObjectsTeam($equipos);

    // recorre $results, creando el asociativo con los valores a cero (puntos, etc..)
    // usa la clase Equipo


    return $equipos;
}

function convertTableToArrayObjectsTeam($result) {
    $arrayObjectsTeam = array();
    foreach ($result as $k => $oneTeamDatas) {
        $oneTeam = new Equipo();
        $oneTeam->setId($oneTeamDatas['id']);
        $oneTeam->setPuntos(0);
        $oneTeam->setNombreCorto($oneTeamDatas['nombreCorto']);
        $oneTeam->setNombre($oneTeamDatas['nombre']);
        $oneTeam->setPg(0);
        $oneTeam->setPe(0);
        $oneTeam->setPp(0);
        $oneTeam->setGf(0);
        $oneTeam->setGc(0);
        $arrayObjectsTeam[$oneTeamDatas['nombreCorto']] = $oneTeam;
    }
    return $arrayObjectsTeam;
}

function convertTableToArrayObjectsMatch($result) {
    $arrayObjectsMatch = array();
    foreach ($result as $k => $oneMatchDatas) {
        $oneMatch = new Partido($oneMatchDatas['id']);
        $oneMatch->setJornada($oneMatchDatas['jornada']);
        $oneMatch->setEL($oneMatchDatas['eL']);
        $oneMatch->setGL($oneMatchDatas['gL']);
        $oneMatch->setEV($oneMatchDatas['eV']);
        $oneMatch->setGV($oneMatchDatas['gV']);
        $arrayObjectsMatch[$oneMatchDatas['id']] = $oneMatch;
    }
    return $arrayObjectsMatch;
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
    $partidos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    $equipos = cargaEquipos();
    $partidos = convertTableToArrayObjectsMatch($partidos);
    echo "<pre>";
    echo "<a href='../index.php'> Regresar al menú anterior</a><br>";
    echo "</pre>";
    $clasificacion = teamClasification($partidos, $equipos);


    return $clasificacion;
}
// la funci�n que recibe el asociativo anterior y lo ordena por puntos...


function ordenaPorPuntos($arrayToSort, $sortKeyName, $sortDirection) {
    $transformationToGet = 'get'.strtoupper(substr($sortKeyName,0,1)).substr($sortKeyName,1);
    foreach ($arrayToSort as $key => $row) {
        $arrayKeyToSort[$key] = $row->$transformationToGet();
    }
    array_multisort($arrayKeyToSort, $sortDirection, $arrayToSort);
    return $arrayToSort;
}

function muestra_Clasificacion($arrayTeamClasification)  {
$arrayHeaders = ["Pg","Pe","Pp","Gf","Gc","PUNTOS"];
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>TEAMs</th>";

    foreach ($arrayHeaders as $v){
        echo "<th>" . $v . "<a class='sort' href='../ejercicios/clasificacion.php?opc=mostrar&sort=true&by=" . $v . "'><img class='sortFilter' src='../filter.png' alt='sort'></a></th>";

    }
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($arrayTeamClasification as $shortTeamName => $team) {
        echo "<tr>";
        foreach (get_class_methods($team) as $attribute => $value) {
            if (substr($value,0,3) == 'get' && $value != 'getId' && $value != 'getNombreCorto') {
                echo "<td>" . $team->$value() . "</td>";
                if ($value == 'getLargeTeamName') {
                    echo "<td>" . $team->calculatePoints() . "</td>";
                }
            }
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";

}

function teamClasification($partidos, $equipos) {
    $arrayTeamClasification = array();
    $teams = $equipos;
    $matches = $partidos;
    foreach ($matches as $orderMatch => $match) {

        $shortNameLocalTeam = $match->getEL();
        $goalsLocalTeam = intval($match->getGL());
        $shortNameVisitTeam = $match->getEV();
        $goalsVisitTeam = intval($match->getGV());

        if (!key_exists($shortNameLocalTeam, $arrayTeamClasification)) {
            $arrayTeamClasification[$shortNameLocalTeam] = array("puntos" => 0, "gf" => 0, "gc" => 0, "pg" => 0, "pe" => 0, "pp" => 0);
        }
        if (!key_exists($shortNameVisitTeam, $arrayTeamClasification)) {
            $arrayTeamClasification[$shortNameVisitTeam] = array("puntos" => 0, "gf" => 0, "gc" => 0, "pg" => 0, "pe" => 0, "pp" => 0);
        }
        $clasDatasTemp = setWonDrawnLost($goalsLocalTeam, $goalsVisitTeam);
        $arrayTeamMatch = array($shortNameLocalTeam, $shortNameVisitTeam);

        for ($i = 0; $i < 2; $i++) {
            $teamName = $arrayTeamMatch[$i];
            $j = 0;
            foreach ($arrayTeamClasification[$teamName] as $dataName => $value) {

                $transformationToSet = 'set'.strtoupper(substr($dataName,0,1)).substr($dataName,1);
                $transformationToGet = 'get'.strtoupper(substr($dataName,0,1)).substr($dataName,1);

                if ($dataName != "points" && $goalsLocalTeam != -1 ) {
                    $team = $teams[$teamName];
                    $team->$transformationToSet($team->$transformationToGet() + $clasDatasTemp[$i][$j]);
                    $teams[$teamName] = $team;
                }
                $j++;
            }
        }
    }
    return $teams;
}


function setWonDrawnLost($goalsLocalTeam, $goalsVisitTeam) {

    $clasDatasTemp = array(array(0, 0, 0, 0, 0, 0), array(0, 0, 0, 0, 0, 0));

    if ($goalsLocalTeam > $goalsVisitTeam) {
        $clasDatasTemp = array(array(3, $goalsLocalTeam, $goalsVisitTeam, 1, 0, 0), array(0, $goalsVisitTeam, $goalsLocalTeam, 0, 0, 1));

    } elseif ($goalsLocalTeam < $goalsVisitTeam) {
        $clasDatasTemp = array(array(0, $goalsLocalTeam, $goalsVisitTeam, 0, 0, 1), array(3, $goalsVisitTeam, $goalsLocalTeam, 1, 0, 0));

        // la siguiente condicion se pone pq en la tabla los partidos que aun no se han jugado tienen como goles -1
    } elseif ($goalsLocalTeam != -1 && $goalsVisitTeam != -1) {
        $clasDatasTemp = array(array(1, $goalsLocalTeam, $goalsVisitTeam, 0, 1, 0), array(1, $goalsVisitTeam, $goalsLocalTeam, 0, 1, 0));
    }
    return $clasDatasTemp;
}
