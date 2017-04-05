<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 29/03/17
 * Time: 07:24 PM
 */
require_once __DIR__ . "/../interfaces/IPersonaDAO.php";
require_once "Conexion.php";

class PersonaDAO extends Conexion implements IPersonaDAO {

    public function __construct() {
        parent::__construct();
    }

    public function create(Persona $persona): void {
        $query = "INSERT INTO personas VALUES (NULL, ?,?,?,?,?,?,?)";
        $stmt = $this->conexion->prepare($query);
        if ($stmt->errno) {
            $this->print_error("Falló la preparación");
        } else {
            $name = $persona->getName();
            $surname1 = $persona->getSurname1();
            $surname2 = $persona->getSurname2();
            $email = $persona->getEmail();
            $phone = $persona->getPhone();
            $marital_status = $persona->getMaritalStatus();
            $hobbies = $persona->getHobbies();
            if (!$stmt->bind_param('sssssss', $name, $surname1, $surname2, $email, $phone, $marital_status, $hobbies)) {
                $this->print_error("Falló la vinculación");
            }
            if (!$stmt->execute()) {
                $this->print_error("Falló la inserción");
            } else {
                $this->close($stmt);
            }
        }
    }

    public function getAll(): array {
        $resultado = [];
        $query = "SELECT * FROM personas";
        $stmt = $this->conexion->prepare($query);
        if ($stmt->errno) {
            $this->print_error("Falló la preparación de la consulta");
        } else {
            if (!$stmt->execute()) {
                $this->print_error("Ha habido un error en la consulta");
            } else {
                $stmt->bind_result($id, $name, $surname1, $surname2, $email, $phone, $marital_status, $hobbies);
                while ($listado = $stmt->fetch()) {
                    $resultado[] = new Persona($name, $surname1, $surname2, $email, $phone, $marital_status, $hobbies);
                }
                $this->close($stmt);
            }
        }
        return $resultado;
    }

    public function getId(int $idPersona): Persona {
        $query = "SELECT * FROM personas WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        if ($stmt->errno) {
            $this->print_error("Falló la preparación de la consulta");
        } else {
            if (!$stmt->bind_param('i', $idPersona)) {
                $this->print_error("Hay un fallo en el parámetro indicado");
            } else {
                if (!$stmt->execute()) {
                    $this->print_error("Ha ocurrido un error al ejecutar la sentencia");
                } else {
                    $stmt->bind_result($id, $name, $surname1, $surname2, $email, $phone, $marital_status, $hobbies);
                    while ($listado = $stmt->fetch()) {
                        $persona = new Persona($name, $surname1, $surname2, $email, $phone, $marital_status, $hobbies);
                    }
                    $this->close($stmt);
                }
            }

        }
        return $persona;
    }

    public function update(int $idPersona, Persona $persona): void {
        $query = "UPDATE personas SET name=?, surname1=?, surname2=?, email=?, phone=?, marital_status=?, hobbies=? WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        if ($stmt->errno) {
            $this->print_error("Falló la preparación de la consulta");
        } else {
            $name = $persona->getName();
            $surname1 = $persona->getSurname1();
            $surname2 = $persona->getSurname2();
            $email = $persona->getEmail();
            $phone = $persona->getPhone();
            $marital_status = $persona->getMaritalStatus();
            $hobbies = $persona->getHobbies();
            if (!$stmt->bind_param('sssssssi', $name, $surname1, $surname2, $email, $phone, $marital_status, $hobbies, $idPersona)) {
                $this->print_error("Hubo un error en la vinculación de los parámetros");
            } else {
                if (!$stmt->execute()) {
                    $this->print_error("Hubo un error al ejecutar la consulta");
                } else {
                    echo "Correcto. Se han actualizado los datos";
                    $this->close($stmt);
                }
            }
        }
    }

    public function delete(int $id): void {
        $query = "DELETE FROM personas WHERE id=?";
        $stmt = $this->conexion->prepare($query);
        if ($stmt->errno) {
            $this->print_error("Falló la preparación de la consulta");
        } else {
            if (!$stmt->bind_param('i', $id)) {
                $this->print_error("Falló la vinculación del parámetro");
            }else{
                if(!$stmt->execute()){
                    $this->print_error("Hubo un error al eliminar");
                }else{
                    echo "Eliminado correctamente";
                    $this->close($stmt);
                }
            }

        }

    }

    private function print_error($message) {
        echo "$message ({$this->conexion->errno}) {$this->conexion->error}";
    }

    /**
     * @param $stmt
     */
    private function close($stmt): void {
        $stmt->close();
        $this->conexion->close();
    }

}