<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 29/03/17
 * Time: 07:18 PM
 */

require_once __DIR__ . "/../clases/Persona.php";

interface IPersonaDAO {

    public function create(Persona $persona): void;

    public function getAll(): array;

    public function getId(int $idPersona): Persona;

    public function update(int $idPersona, Persona $persona): void;

    public function delete(int $idPersona): void;

}