<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 29/03/17
 * Time: 11:21 PM
 */
require_once "config/config.php";
require_once __DIR__ . "/database/PersonaDAO.php";


function muestraPersonas() {
    $conexionMySQL = new PersonaDAO;
    $personas = $conexionMySQL->getAll();
    return implode("", $personas);
}

if (!isset($HTTP_RAW_POST_DATA)) {
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
}
$server = new soap_server();
$server->configureWSDL("Info personas", "urn:infoPersonas");
$server->register("muestraPersonas", [], ["return" => "xsd:string"], 'urn:infoPersonas', 'urn:infoPersonas#muestraPersonas', 'rpc', 'encoded', 'Muestra el contenido de las personas');
$server->service($HTTP_RAW_POST_DATA);
