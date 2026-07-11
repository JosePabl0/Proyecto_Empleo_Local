<?php
// MODELO POSTULACION
require_once __DIR__ . "/../core/Model.php";

class Postulacion extends Model{

    private $table="postulaciones";

    // CREAR POSTULACION
    public function crear($datos){

        $sql="INSERT INTO postulaciones
        (
            id_oferta,
            id_candidato,
            id_estado
        )
        VALUES
        (
            :oferta,
            :candidato,
            1
        )";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            ":oferta"=>$datos["id_oferta"],
            ":candidato"=>$datos["id_candidato"]
        ]);

    }

    // OBTENER POSTULACIONES CANDIDATO
    public function obtenerPorCandidato($id){

        $sql="SELECT
                p.*,
                o.titulo,
                e.nombre_empresa,
                ep.nombre AS estado
              FROM postulaciones p
              INNER JOIN ofertas o
              ON p.id_oferta=o.id_oferta
              INNER JOIN empresas e
              ON o.id_empresa=e.id_empresa
              INNER JOIN estados_postulacion ep
              ON p.id_estado=ep.id_estado
              WHERE p.id_candidato=:id
              ORDER BY p.fecha_postulacion DESC";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":id"=>$id
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // OBTENER CANDIDATOS POR OFERTA
    public function obtenerCandidatosPorOferta($idOferta){

        $sql="SELECT
                p.id_postulacion,
                p.fecha_postulacion,
                p.id_estado,
                ep.nombre AS estado,
                c.id_candidato,
                c.descripcion,
                c.ubicacion,
                c.experiencia,
                c.disponibilidad,
                c.curriculum,
                u.nombre,
                u.correo
              FROM postulaciones p
              INNER JOIN candidatos c
              ON p.id_candidato=c.id_candidato
              INNER JOIN usuarios u
              ON c.id_usuario=u.id_usuario
              INNER JOIN estados_postulacion ep
              ON p.id_estado=ep.id_estado
              WHERE p.id_oferta=:oferta
              ORDER BY p.fecha_postulacion DESC";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":oferta"=>$idOferta
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // ACTUALIZAR ESTADO POSTULACION
    public function actualizarEstado($idPostulacion,$estado){

        $sql="UPDATE postulaciones
              SET id_estado=:estado
              WHERE id_postulacion=:postulacion";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            ":estado"=>$estado,
            ":postulacion"=>$idPostulacion
        ]);

    }

    // OBTENER ESTADOS POSTULACION
    public function obtenerEstados(){

        $sql="SELECT *
              FROM estados_postulacion
              ORDER BY id_estado";

        $stmt=$this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // VERIFICAR POSTULACION EXISTENTE
    public function yaPostulado($idOferta,$idCandidato){

        $sql="SELECT id_postulacion
              FROM postulaciones
              WHERE id_oferta=:oferta
              AND id_candidato=:candidato";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":oferta"=>$idOferta,
            ":candidato"=>$idCandidato
        ]);

        return $stmt->fetch();

    }

    // CANCELAR POSTULACION
    public function cancelar($idPostulacion,$idCandidato){

        $sql="DELETE FROM postulaciones
              WHERE id_postulacion=:id
              AND id_candidato=:candidato";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            ":id"=>$idPostulacion,
            ":candidato"=>$idCandidato
        ]);

    }

}
?>