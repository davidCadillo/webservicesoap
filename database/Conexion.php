<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 29/03/17
 * Time: 06:14 PM
 */
require_once __DIR__ . "/../config/config.php";

class Conexion {

    protected $conexion;

    /**
     * Conexion constructor.
     */
    public function __construct() {
        $this->conexion = new mysqli(DB_PARAMS['host'], DB_PARAMS['username'], DB_PARAMS['passwd'], DB_PARAMS['dbname']);
        $this->conexion->set_charset("utf8");
        if ($this->conexion->connect_errno) {
            echo "Hubo un error conectando a la base de datos\n" . $this->conexion->connect_error;
            exit();
        }
    }

    /**
     * @return mysqli
     */
    public function getConexion(): mysqli {
        return $this->conexion;
    }

    /**
     * @param mysqli $conexion
     */
    public function setConexion(mysqli $conexion) {
        $this->conexion = $conexion;
    }


}

