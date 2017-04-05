<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 31/03/17
 * Time: 04:15 PM
 */

require_once 'config/config.php';
$cliente = new nusoap_client("http://www.webservicex.net/geoipservice.asmx?WSDL", "wsdl");
$resultado = $cliente->call("GetGeoIP", ["IPAddress" => "93.156.93.160"]);
$matriz = $resultado['GetGeoIPResult'];
echo $matriz['CountryCode'];