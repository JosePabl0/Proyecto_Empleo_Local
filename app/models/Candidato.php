<?php
// MODELO CANDIDATO
require_once __DIR__."/../core/Model.php";

class Candidato extends Model{

    // OBTENER CANDIDATO POR USUARIO
    public function obtenerPorUsuario($idUsuario){

        $sql="SELECT *
              FROM candidatos
              WHERE id_usuario=:usuario";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":usuario"=>$idUsuario
        ]);

        return $stmt->fetch();

    }

    // ACTUALIZAR DATOS CANDIDATO
    public function actualizar($datos){

        $sql="UPDATE candidatos SET
                descripcion=:descripcion,
                ubicacion=:ubicacion,
                experiencia=:experiencia,
                disponibilidad=:disponibilidad
              WHERE id_candidato=:id";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            ":descripcion"=>$datos["descripcion"],
            ":ubicacion"=>$datos["ubicacion"],
            ":experiencia"=>$datos["experiencia"],
            ":disponibilidad"=>$datos["disponibilidad"],
            ":id"=>$datos["id_candidato"]
        ]);

    }

    // ACTUALIZAR CURRICULUM
    public function actualizarCurriculum($idCandidato,$archivo){

        $sql="UPDATE candidatos
              SET curriculum=:curriculum
              WHERE id_candidato=:id";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            ":curriculum"=>$archivo,
            ":id"=>$idCandidato
        ]);

    }

    // OBTENER TODOS LOS CANDIDATOS
    public function obtenerTodos(){

        $sql="SELECT *
              FROM candidatos";

        $stmt=$this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();

    }

}

?>