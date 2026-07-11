<?php
// MODELO EMPRESA
require_once __DIR__."/../core/Model.php";

class Empresa extends Model{

    // OBTENER EMPRESA POR USUARIO
    public function obtenerPorUsuario($idUsuario){

        $sql="SELECT *
              FROM empresas
              WHERE id_usuario=:usuario";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":usuario"=>$idUsuario
        ]);

        return $stmt->fetch();

    }

    // ACTUALIZAR DATOS EMPRESA
    public function actualizar($datos){

        $sql="UPDATE empresas SET
            nombre_empresa=:nombre,
            descripcion=:descripcion,
            ubicacion=:ubicacion,
            sector=:sector,
            telefono=:telefono,
            sitio_web=:web
            WHERE id_empresa=:id";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            ":nombre"=>$datos["nombre_empresa"],
            ":descripcion"=>$datos["descripcion"],
            ":ubicacion"=>$datos["ubicacion"],
            ":sector"=>$datos["sector"],
            ":telefono"=>$datos["telefono"],
            ":web"=>$datos["sitio_web"],
            ":id"=>$datos["id_empresa"]
        ]);

    }

    // OBTENER TODAS LAS EMPRESAS
    public function obtenerTodas(){

        $sql="SELECT *
              FROM empresas";

        $stmt=$this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();

    }

    // CONTAR OFERTAS ACTIVAS
    public function contarOfertasActivas($idEmpresa){

        $sql="SELECT COUNT(*) AS total
              FROM ofertas
              WHERE id_empresa=:empresa
              AND estado=1";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":empresa"=>$idEmpresa
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC)["total"];

    }

    // CONTAR CANDIDATOS RECIBIDOS
    public function contarCandidatos($idEmpresa){

        $sql="SELECT COUNT(*) AS total
              FROM postulaciones p
              INNER JOIN ofertas o
              ON p.id_oferta=o.id_oferta
              WHERE o.id_empresa=:empresa";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":empresa"=>$idEmpresa
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC)["total"];

    }

    // CONTAR PROCESOS PENDIENTES
    public function contarPendientes($idEmpresa){

        $sql="SELECT COUNT(*) AS total
              FROM postulaciones p
              INNER JOIN ofertas o
              ON p.id_oferta=o.id_oferta
              WHERE o.id_empresa=:empresa
              AND p.id_estado=1";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":empresa"=>$idEmpresa
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC)["total"];

    }

    // OBTENER EMPRESA POR ID
    public function obtenerPorId($idEmpresa){

        $sql="SELECT *
              FROM empresas
              WHERE id_empresa=:id";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":id"=>$idEmpresa
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

}

?>