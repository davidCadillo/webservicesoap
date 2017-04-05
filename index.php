<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 29/03/17
 * Time: 10:59 AM
 */

$curl = curl_init("http://localhost/webservicev2b/datos.txt");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$respuesta = curl_exec($curl);
$info = curl_getinfo($curl);

if ($info['http_code'] == 200) {
    $datos = explode(PHP_EOL, $respuesta);
    echo "<h1>Frutas en la tienda</h1>";
    echo "<ul>";
    foreach ($datos as $fruta) {
        echo "<li>".$fruta."</li>";
    }
    echo "</ul>";
    curl_close($curl);
} else {
    echo 'Error' . curl_error($curl);
}
