<?php

class DB
{
    private $host = "localhost";
    private $usr = "root";
    private $db = "bdfinalphp";
    private $pwd = "";
    private $conexionMysqli;
    private $conexionPDO;


    public function __construct()
    {
        try {
            $this->conexionMysqli = new mysqli($this->host, $this->usr, $this->pwd, $this->db);
            $this->conexionPDO = new PDO("mysql:host=$this->host;dbname=$this->db", $this->usr, $this->pwd);

        } catch (SQLException $e) {
            die($e->getMessage());
        }


    }

    // método general para obtener asociativo con todos los registros de una tabla
    // dada

    public function registrosTodosPDO($tabla)
    {


    }

    public function registrosTodosmysqli($tabla)
    {

        $conn = $this->conexionMysqli;
        if (!$conn->connect_error) {
            $sql = "SELECT * FROM ". $tabla;
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $registros = array();
                while ($registro = $result->fetch_assoc())
                    $registros[] = $registro;
                return $registros;
            } else {
                echo "No hay registros";
                return null;
            }

            $conn->close();
        } else
            die("Connection failed: " . $conn->connect_error);
    }

    public  function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public
    function setHost(string $host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public
    function getUsr(): string
    {
        return $this->usr;
    }

    /**
     * @param string $usr
     */
    public
    function setUsr(string $usr)
    {
        $this->usr = $usr;
    }

    /**
     * @return string
     */
    public
    function getDb(): string
    {
        return $this->db;
    }

    /**
     * @param string $db
     */
    public
    function setDb(string $db)
    {
        $this->db = $db;
    }

    /**
     * @return string
     */
    public
    function getPwd(): string
    {
        return $this->pwd;
    }

    /**
     * @param string $pwd
     */
    public
    function setPwd(string $pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * @return mysqli
     */
    public
    function getConexionMysqli(): mysqli
    {
        return $this->conexionMysqli;
    }

    /**
     * @param mysqli $conexionMysqli
     */
    public
    function setConexionMysqli(mysqli $conexionMysqli)
    {
        $this->conexionMysqli = $conexionMysqli;
    }

    /**
     * @return PDO
     */
    public
    function getConexionPDO(): PDO
    {
        return $this->conexionPDO;
    }

    /**
     * @param PDO $conexionPDO
     */
    public
    function setConexionPDO(PDO $conexionPDO)
    {
        $this->conexionPDO = $conexionPDO;
    }


}

?>