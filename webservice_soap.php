<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 29/03/17
 * Time: 12:27 PM
 */
require_once 'config/config.php';
function muestraPlanetas() {
    $planetas = "<p>Según la definición mencionada, el Sistema solar consta de 9 planetas.</p>";
    return $planetas;
}

function muestraImagen($categoria, $id = NULL) {
    $base_url = "http://lorempixel.com/200/200";
    $imagen = '';
    switch ($categoria) {
        case 'animal':
            $imagen = is_null($id) ? "$base_url/animals" : "$base_url/animals/$id";
            break;
        case 'ciudad':
            $imagen = "http://lorempixel.com/200/200/city";
            break;
        case 'comida':
            $imagen = "http://lorempixel.com/200/200/food";
            break;
    }
    $resultado = "<img src=\"$imagen\" alt='linda imagen'>";
    return $resultado;
}


if (!isset($HTTP_RAW_POST_DATA)) {
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
}

$server = new soap_server();
$server->configureWSDL("Info blog", "urn:infoBlog");
$server->register("muestraPlanetas", [], ["return" => "xsd:string"], 'urn:infoBlog', 'urn:infoBlog#muestraPlanetas', 'rpc', 'encoded', 'Muestra el contenido para el blog');
$server->register("muestraImagen", ["categoria"=>"xsd:string","id"=>"xsd:int"], ["return" => "xsd:string"], 'urn:infoBlog', 'urn:infoBlog#muestraImagen', 'rpc', 'encoded', 'Muestra imagen en el blog');
$server->service($HTTP_RAW_POST_DATA);



