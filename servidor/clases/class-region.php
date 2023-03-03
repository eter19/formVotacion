<?php
include_once("../data/conexion.php");

class Region
{
    private $name;

    public function obtenerRegiones()
    {
        $conexion = new Conexion();
        $query = "SELECT * FROM region";
        $data = $conexion->getDatos($query);
        return json_encode($data);
    }


}