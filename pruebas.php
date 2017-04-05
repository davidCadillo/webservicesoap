<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 29/03/17
 * Time: 06:22 PM
 */

require_once __DIR__ . "/database/PersonaDAO.php";
$persona = new Persona('David', 'Cadillo', 'Blas', 'cadillodavid@gmail.com', '+51969875995', 'single', 'read, tennis');
$personaDAO = new PersonaDAO();
$personas = $personaDAO->getAll();

print_r($personas);





