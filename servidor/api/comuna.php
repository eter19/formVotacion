<?php
//Recibir peticiones del usuario
header("Content-Type: application/json");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
include_once("../clases/class-comuna.php");
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $comuna = new Comuna();
        print_r($comuna->obtenerComunas($_GET['id']));
        break;
    default:
        echo 'metodo no permitido';
        break;
}
?>