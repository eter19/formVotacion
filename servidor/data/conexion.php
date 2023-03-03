<?php
class Conexion
{
    private $server;
    private $user;
    private $password;
    private $database;
    private $port;
    private $conexion;
    // private $listdatos;
    function __construct()
    {
        $listdatos = $this->datosConexion();
        foreach ($listdatos as $key => $value) {
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->password = $value['password'];
            $this->database = $value['database'];
            $this->port = $value['port'];
        }
        $this->conexion = new mysqli($this->server, $this->user, $this->password, $this->database, $this->port);
        if ($this->conexion->connect_errno) {
            echo "Algo fue mal";
            die();
        }
    }

    private function datosConexion()
    {
        $direccion = dirname(__FILE__);
        $jsondata = file_get_contents($direccion . '/' . "config");
        return json_decode($jsondata, true);
    }
    private function convertirUFT8($array)
    {

        return mb_convert_encoding($array, "UTF-8", mb_detect_encoding($array));
    }
    public function getDatos($query)
    {
        $results = $this->conexion->query($query);
        $resultArray = array();
        foreach ($results as $key) {
            $resultArray[] = $key;
        }
        return $resultArray;
    }


    public function nonQuery(
        $nombreyapellido,
        $alias,
        $rut,
        $regionId,
        $comunaId,
        $candidatoId,
        $conocio
    )
    {
        $results = $this->conexion->prepare("INSERT INTO votos (nombreyapellido,alias,rut,regionId,comunaId,candidatoId,conocio) VALUES (?,?,?,?,?,?,?)");
        $results->execute(array($nombreyapellido, $alias, $rut, $regionId, $comunaId, $candidatoId, $conocio));
        $results->close();
        $this->conexion->close();

    }
    public function veryRut(
        $rut,
    )
    {
        $results = $this->conexion->prepare("SELECT * FROM votos where rut=?");
        $v = json_decode($results->execute(array($rut)), true);
        $results->close();
        $this->conexion->close();
        return $v;
    }
    public function nonQueryId($query)
    {
        $results = $this->conexion->prepare($query);
        $filas = $this->conexion->affected_rows;
        if ($filas >= 1) {
            return $this->conexion->insert_id;
        } else {
            return 0;
        }
    }
}