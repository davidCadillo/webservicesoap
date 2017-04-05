<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 29/03/17
 * Time: 07:15 PM
 */
class Persona {

    private $name;
    private $surname1;
    private $surname2;
    private $email;
    private $phone;
    private $marital_status;
    private $hobbies;

    /**
     * Persona constructor.
     *
     * @param $nombre
     * @param $surname1
     * @param $surname2
     * @param $email
     * @param $phone
     * @param $marital_status
     * @param $hobies
     */
    public function __construct($nombre, $surname1, $surname2, $email, $phone, $marital_status, $hobies) {
        $this->name = $nombre;
        $this->surname1 = $surname1;
        $this->surname2 = $surname2;
        $this->email = $email;
        $this->phone = $phone;
        $this->marital_status = $marital_status;
        $this->hobbies = $hobies;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname1() {
        return $this->surname1;
    }

    /**
     * @param mixed $surname1
     */
    public function setSurname1($surname1) {
        $this->surname1 = $surname1;
    }

    /**
     * @return mixed
     */
    public function getSurname2() {
        return $this->surname2;
    }

    /**
     * @param mixed $surname2
     */
    public function setSurname2($surname2) {
        $this->surname2 = $surname2;
    }

    /**
     * @return mixed
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getMaritalStatus() {
        return $this->marital_status;
    }

    /**
     * @param mixed $marital_status
     */
    public function setMaritalStatus($marital_status) {
        $this->marital_status = $marital_status;
    }

    /**
     * @return mixed
     */
    public function getHobbies() {
        return $this->hobbies;
    }

    /**
     * @param mixed $hobbies
     */
    public function setHobbies($hobbies) {
        $this->hobbies = $hobbies;
    }

    function __toString(): string {
        $datos = $this->name . " " . $this->surname1 . " " . $this->surname2 . " " . $this->email. ",";
        return $datos;
    }


}