<?php
// MODELO OFERTA
require_once __DIR__ . "/../core/Model.php";

class Oferta extends Model
{

    private $tabla = "ofertas";

    // CREAR OFERTA
    public function crear($datos)
    {

        $sql = "INSERT INTO ofertas
        (
            id_empresa,
            id_categoria,
            titulo,
            descripcion,
            requisitos,
            salario,
            modalidad,
            ubicacion
        )
        VALUES
        (
            :empresa,
            :categoria,
            :titulo,
            :descripcion,
            :requisitos,
            :salario,
            :modalidad,
            :ubicacion
        )";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ":empresa" => $datos["id_empresa"],
            ":categoria" => $datos["id_categoria"],
            ":titulo" => $datos["titulo"],
            ":descripcion" => $datos["descripcion"],
            ":requisitos" => $datos["requisitos"],
            ":salario" => $datos["salario"],
            ":modalidad" => $datos["modalidad"],
            ":ubicacion" => $datos["ubicacion"]
        ]);

    }

    // OBTENER TODAS LAS OFERTAS
    public function obtenerTodas()
    {

        $sql = "SELECT
                    o.*,
                    e.nombre_empresa,
                    c.nombre AS categoria
                FROM ofertas o
                INNER JOIN empresas e
                    ON o.id_empresa = e.id_empresa
                INNER JOIN categorias c
                    ON o.id_categoria = c.id_categoria
                ORDER BY o.fecha_publicacion DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // OBTENER OFERTAS POR EMPRESA
    public function obtenerPorEmpresa($id_empresa)
    {

        $sql = "SELECT
                    o.*,
                    c.nombre AS categoria
                FROM ofertas o
                INNER JOIN categorias c
                    ON o.id_categoria = c.id_categoria
                WHERE o.id_empresa = :empresa
                ORDER BY o.fecha_publicacion DESC";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ":empresa"=>$id_empresa
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    // OBTENER DETALLE OFERTA
    public function obtenerDetalle($id)
    {

        $sql="SELECT
                o.*,
                c.nombre AS categoria,
                e.id_empresa,
                e.nombre_empresa,
                e.descripcion AS descripcion_empresa,
                e.ubicacion AS ubicacion_empresa,
                e.sector,
                e.telefono,
                e.sitio_web
              FROM ofertas o
              INNER JOIN empresas e
              ON o.id_empresa=e.id_empresa
              INNER JOIN categorias c
              ON o.id_categoria=c.id_categoria
              WHERE o.id_oferta=:id";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":id"=>$id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    // BUSCAR OFERTA POR ID
    public function obtenerPorId($id)
    {

        $sql = "SELECT *
                FROM ofertas
                WHERE id_oferta = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":id",$id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    // ACTUALIZAR OFERTA
    public function actualizar($datos)
    {

        $sql = "UPDATE ofertas SET
                    titulo=:titulo,
                    descripcion=:descripcion,
                    requisitos=:requisitos,
                    salario=:salario,
                    modalidad=:modalidad,
                    ubicacion=:ubicacion,
                    id_categoria=:categoria
                WHERE id_oferta=:id";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ":titulo"=>$datos["titulo"],
            ":descripcion"=>$datos["descripcion"],
            ":requisitos"=>$datos["requisitos"],
            ":salario"=>$datos["salario"],
            ":modalidad"=>$datos["modalidad"],
            ":ubicacion"=>$datos["ubicacion"],
            ":categoria"=>$datos["id_categoria"],
            ":id"=>$datos["id_oferta"]
        ]);

    }

    // ELIMINAR OFERTA
    public function eliminar($id)
    {

        $sql = "DELETE
                FROM ofertas
                WHERE id_oferta=:id";

        $stmt = $this->db->prepare($sql);

        $stmt->bindParam(":id",$id);

        return $stmt->execute();

    }

    // ELIMINAR OFERTA POR EMPRESA
    public function eliminarPorEmpresa($id_oferta,$id_empresa)
    {

        $sql = "DELETE FROM ofertas
                WHERE id_oferta=:oferta
                AND id_empresa=:empresa";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ":oferta"=>$id_oferta,
            ":empresa"=>$id_empresa
        ]);

    }

    // VERIFICAR POSTULACIONES
    public function tienePostulaciones($id_oferta)
    {

        $sql="
            SELECT COUNT(*) AS total
            FROM postulaciones
            WHERE id_oferta=:oferta
        ";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":oferta"=>$id_oferta
        ]);

        $resultado=$stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado["total"] > 0;

    }

    // VERIFICAR PERTENENCIA EMPRESA
    public function perteneceAEmpresa($id_oferta,$id_empresa)
    {

        $sql="SELECT id_oferta
              FROM ofertas
              WHERE id_oferta=:oferta
              AND id_empresa=:empresa";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":oferta"=>$id_oferta,
            ":empresa"=>$id_empresa
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

}

?>