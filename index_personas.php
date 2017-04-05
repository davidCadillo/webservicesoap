<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 29/03/17
 * Time: 11:29 PM
 */
require_once 'config/config.php';
$cliente = new nusoap_client("http://localhost/webservicev2b/webservice_personas.php?wsdl&debug=0","wsdl");
$resultado = $cliente->call("muestraPersonas");
$array = explode(",", $resultado);
echo "<h2>Las personas</h2>";
foreach ($array as $item) {
    echo "<li>$item</li>";
}
