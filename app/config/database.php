<?php
// CONFIGURACION DE CONEXION BD
class Database{

    private $host = "localhost";
    private $db = "empleolocal";
    private $user = "root";
    private $password = "";
    #9029
    private $connection = null;

    // CREAR CONEXION
    public function conectar(){

        if($this->connection != null){
            return $this->connection;
        }

        try{

            // CONEXION PDO MYSQL
            $this->connection = new PDO(
                "mysql:host=".$this->host.";dbname=".$this->db.";charset=utf8",
                $this->user,
                $this->password
            );

            // CONFIGURACION DE ERRORES
            $this->connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            // FORMATO DE RESULTADOS
            $this->connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

            return$this->connection;

        }catch(PDOException $e){

            // ERROR DE CONEXION
            die(
                "Error de conexión: ".$e->getMessage()
            );

        }

    }

}