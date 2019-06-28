<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Clase controladora principal para los servicios REST
 */
class RestController extends CI_Controller
{

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET');
        header("Access-Control-Allow-Headers: X-Requested-With");
    }

    /**
     * Metodo para cargar el modelo de la tabla a operar
     */
    public function loadModel($modelo)
    {
        $this->load->model($modelo);
    }

    /**
     * Metodo para determinar el tipo de accion a realizar
     * Basado en el verbo de la peticionb HTTP
     */
    public function setMethod()
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                if (isset($_GET['id'])) {
                    $this->getById($_GET['id']);
                } else {
                    $this->get();
                }
                break;

            case 'POST':
                $this->post();
                break;

            case 'PUT':
                $this->put();
                break;

            case 'DELETE':
                $this->delete();
                break;

            default:
                $this->get();
                break;
        }
    }

    /**
     * Metodo para obtener el arreglo con los valores recibidos en el JSON de la peticion HTTP
     */
    public function getData()
    {
        $data = [];
        $datos = json_decode(file_get_contents("php://input"));
        foreach ($datos as $registro => $value) {
            $item = $value;
            array_push($data, $item);
        }
        return $data;
    }
}
