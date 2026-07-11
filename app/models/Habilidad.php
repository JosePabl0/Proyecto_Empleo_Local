<?php
// MODELO HABILIDAD
require_once __DIR__ . "/../core/Model.php";

class Habilidad extends Model{

    private $table="habilidades";

    // OBTENER TODAS LAS HABILIDADES
    public function obtenerTodas(){

        $sql="
        SELECT *
        FROM habilidades
        ORDER BY nombre ASC
        ";

        $stmt=$this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // AGREGAR HABILIDAD A CANDIDATO
    public function agregarACandidato($datos){

        $sql="
        INSERT INTO candidato_habilidad
        (
            id_candidato,
            id_habilidad,
            nivel
        )
        VALUES
        (
            :candidato,
            :habilidad,
            :nivel
        )
        ";

        $stmt=$this->db->prepare($sql);

        $stmt->bindParam(":candidato",$datos["id_candidato"]);

        $stmt->bindParam(":habilidad",$datos["id_habilidad"]);

        $stmt->bindParam(":nivel",$datos["nivel"]);

        return $stmt->execute();

    }

}

?>