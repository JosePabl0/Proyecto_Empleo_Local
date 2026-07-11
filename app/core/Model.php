<?php
// MODELO BASE MVC
require_once __DIR__."/../config/database.php";

class Model{

    protected $db;

    // INICIALIZAR CONEXION BD
    public function __construct(){

        $database = new Database();

        $this->db = $database->conectar();

    }

}

?>