<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 29/03/17
 * Time: 12:32 PM
 */
require_once 'config/config.php';
$cliente = new nusoap_client("http://localhost/webservicev2b/webservice_soap.php?wsdl&debug=0","wsdl");
$planetas = $cliente->call("muestraPlanetas");
$imagen = $cliente->call("muestraImagen", ["categoria" => "animal", "id" => 1]);
echo "<h2>Los planetas</h2>";
echo $planetas;
echo $imagen;
