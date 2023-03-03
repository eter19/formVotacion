<?php
include_once("../data/conexion.php");

class Candidato
{
    private $nombre;

    public function obtenerCandidatos()
    {
        $conexion = new Conexion();
        $data = $conexion->getDatos("SELECT * FROM candidato");

        return json_encode($data);
    }

}