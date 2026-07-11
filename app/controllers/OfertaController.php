<?php
// CONTROLADOR OFERTAS
require_once __DIR__ . "/../core/Controller.php";
require_once __DIR__ . "/../models/Oferta.php";

class OfertaController extends Controller
{

    private $oferta;

    // INICIALIZAR MODELO OFERTA
    public function __construct()
    {
        $this->oferta = new Oferta();
    }

    // LISTAR OFERTAS
    public function index()
    {

        // OBTENER OFERTAS
        $ofertas = $this->oferta->obtenerTodas();

        // CARGAR VISTA OFERTAS
        require_once __DIR__ . "/../../views/empresa/ofertas.php";
    }

    // FORMULARIO CREAR OFERTA
    public function crear()
    {

        // CARGAR VISTA CREAR OFERTA
        require_once __DIR__ . "/../../views/empresa/crear_oferta.php";
    }

    // GUARDAR OFERTA
    public function guardar()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // DATOS OFERTA
            $datos = [

                "id_empresa" => $_POST["id_empresa"],

                "id_categoria" => $_POST["id_categoria"],

                "titulo" => $_POST["titulo"],

                "descripcion" => $_POST["descripcion"],

                "requisitos" => $_POST["requisitos"],

                "salario" => $_POST["salario"],

                "modalidad" => $_POST["modalidad"]

            ];

            // CREAR OFERTA
            if ($this->oferta->crear($datos)) {

                header("Location: ofertas.php");
                exit();
            }
        }
    }

    // ELIMINAR OFERTA
    public function eliminar()
    {

        if (isset($_GET["id"])) {

            $this->oferta->eliminar($_GET["id"]);
        }

        header("Location: /EmpleoLocal/public/ofertas.php");
        exit();
    }

}