<?php
//Recibir peticiones del usuario
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
include_once("../clases/class-voto.php");
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $voto = new Voto();
        print_r($voto->introducirNuevoVoto($_GET["nombreyapellido"], $_GET["alias"], $_GET["rut"], $_GET["regionId"], $_GET["comunaId"], $_GET["candidatoId"], $_GET["conocio"]));
        break;
    default:
        echo $_SERVER['REQUEST_METHOD'];
        break;
}
?>