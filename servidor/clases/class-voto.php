<?php
include_once("../data/conexion.php");

class Voto
{
    private $name;
    private $regionId;

    public function introducirNuevoVoto(
        $nombreyapellido,
        $alias,
        $rut,
        $regionId,
        $comunaId,
        $candidatoId,
        $conocio
    )
    {
        $conexion = new Conexion();
        $very = $conexion->getDatos("SELECT * FROM votos where rut='$rut'");
        if (count($very) > 0) {

            return json_encode(
                array(
                    "Error" => "rut ya existente"
                )
            );
        }
        $conexion->nonQuery(
            $nombreyapellido,
            $alias,
            $rut,
            intval($regionId),
            intval($comunaId),
            intval($candidatoId),
            $conocio
        );
        return json_encode(
            array(
                "OK" => "creado correctamente"
            )
        );


    }


}