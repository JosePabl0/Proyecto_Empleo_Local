<?php
// MODELO CATEGORIA
require_once __DIR__ . "/../core/Model.php";

class Categoria extends Model{

    private $table="categorias";

    // OBTENER TODAS LAS CATEGORIAS
    public function obtenerTodas(){

        $sql="
        SELECT *
        FROM categorias
        ORDER BY nombre ASC
        ";

        $stmt=$this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // CREAR CATEGORIA
    public function crear($nombre){

        $sql="
        INSERT INTO categorias(nombre)
        VALUES(:nombre)
        ";

        $stmt=$this->db->prepare($sql);

        $stmt->bindParam(":nombre",$nombre);

        return $stmt->execute();

    }

}

?>