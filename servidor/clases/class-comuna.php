<?php
include_once("../data/conexion.php");

class Comuna
{
    private $name;
    private $regionId;



    public function obtenerComunas($idRegion)
    {
        $conexion = new Conexion();
        $query = "SELECT c.name as NombreComuna, c.id as IdComuna FROM comuna c JOIN region r ON c.regionId = r.id where r.id=" . $idRegion;
        $data = $conexion->getDatos($query);

        return json_encode($data);
    }


}