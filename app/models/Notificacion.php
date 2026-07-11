<?php
// MODELO NOTIFICACION
require_once __DIR__ . "/../core/Model.php";

class Notificacion extends Model{

    // CREAR NOTIFICACION
    public function crear($datos){

        $sql="
        INSERT INTO notificaciones
        (
            id_usuario,
            mensaje
        )
        VALUES
        (
            :usuario,
            :mensaje
        )
        ";

        $stmt=$this->db->prepare($sql);

        $stmt->bindParam(":usuario",$datos["id_usuario"]);

        $stmt->bindParam(":mensaje",$datos["mensaje"]);

        return $stmt->execute();

    }

    // OBTENER NOTIFICACIONES USUARIO
    public function obtenerPorUsuario($id){

        $sql="
        SELECT *
        FROM notificaciones
        WHERE id_usuario=:id
        ORDER BY fecha DESC
        ";

        $stmt=$this->db->prepare($sql);

        $stmt->bindParam(":id",$id);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>