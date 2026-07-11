<?php
// MODELO USUARIO
require_once __DIR__."/../core/Model.php";

class Usuario extends Model{

    // REGISTRAR USUARIO
    public function registrar($datos){

        try{

            $sql="INSERT INTO usuarios
            (
                nombre,
                correo,
                password,
                id_rol
            )
            VALUES
            (
                :nombre,
                :correo,
                :password,
                :rol
            )";

            $stmt=$this->db->prepare($sql);

            // ENCRIPTAR PASSWORD
            $password=password_hash(
                $datos["password"],
                PASSWORD_DEFAULT
            );

            $stmt->execute([
                ":nombre"=>$datos["nombre"],
                ":correo"=>$datos["correo"],
                ":password"=>$password,
                ":rol"=>$datos["id_rol"]
            ]);

            // OBTENER ID USUARIO CREADO
            $idUsuario=$this->db->lastInsertId();

            // CREAR PERFIL EMPRESA
            if($datos["id_rol"]==2){

                $this->crearEmpresa($idUsuario);

            }

            // CREAR PERFIL CANDIDATO
            if($datos["id_rol"]==3){

                $this->crearCandidato($idUsuario);

            }

            return true;

        }catch(PDOException $e){

            return false;

        }

    }

    // CREAR EMPRESA USUARIO
    private function crearEmpresa($idUsuario){

        $sql="INSERT INTO empresas
        (
            id_usuario,
            nombre_empresa,
            descripcion
        )
        VALUES
        (
            :usuario,
            'Empresa pendiente',
            'Complete la información de la empresa'
        )";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            ":usuario"=>$idUsuario
        ]);

    }

    // CREAR CANDIDATO USUARIO
    private function crearCandidato($idUsuario){

        $sql="INSERT INTO candidatos
        (
            id_usuario,
            descripcion
        )
        VALUES
        (
            :usuario,
            'Complete su perfil profesional'
        )";

        $stmt=$this->db->prepare($sql);

        return $stmt->execute([
            ":usuario"=>$idUsuario
        ]);

    }

    // LOGIN USUARIO
    public function login($correo){

        $sql="SELECT *
              FROM usuarios
              WHERE correo=:correo
              AND estado=1";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":correo"=>$correo
        ]);

        return $stmt->fetch();

    }

    // BUSCAR USUARIO POR ID
    public function buscarPorId($id){

        $sql="SELECT *
              FROM usuarios
              WHERE id_usuario=:id";

        $stmt=$this->db->prepare($sql);

        $stmt->execute([
            ":id"=>$id
        ]);

        return $stmt->fetch();

    }

    // OBTENER TODOS LOS USUARIOS
    public function obtenerTodos(){

        $sql="SELECT 
              u.id_usuario,
              u.nombre,
              u.correo,
              r.nombre AS rol,
              u.estado
              FROM usuarios u
              INNER JOIN roles r
              ON u.id_rol=r.id_rol";

        $stmt=$this->db->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();

    }

}

?>