<?php

defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'controllers/api/RestController.php';

/**
 * Clase controladora para el REST de Usuarios
 */
class UsuariosRest extends RestController
{

    /**
     * Metodo de inicio por defecto
     */
    public function index()
    {
        $this->loadModel('UsuariosModel');
        $this->setMethod();
    }

    /**
     * Metodo para obetener todo los registros de la base de datos
     */
    public function get()
    {
        $data = $this->UsuariosModel->getAll();
        if (isset($data)) {
            echo json_encode($data);
        } else {
            echo "No se encontraron registros";
        }
    }

    /**
     * Metodo para obetener un registro de la base de datos
     */
    public function getById($id)
    {
        $data = $this->UsuariosModel->getById($id);
        if (isset($data)) {
            echo json_encode($data);
        } else {
            echo "No se encontraron registros";
        }
    }

    /**
     * Metodo para ingresar registros en la base de datos
     */
    public function post()
    {
        if ($this->UsuariosModel->ingresar($this->getData())){
            $this->get();
        } else {
            echo "Ocurrio un error al agregar el registro";
        }
        
    }

    /**
     * Metodo para editar registros
     */
    public function put()
    {
        $data2 = [$this->getData()[1], $this->getData()[2], $this->getData()[0]];
        if ($this->UsuariosModel->update($data2)){
            $this->get();
        }  else {
            echo "Ocurrio un error al modificar el registro";
        }
        
    }

    /**
     * Metodo para eliminar registros.
     */
    public function delete()
    {
        $data2 = [$this->getData()[0]];
        if ($this->UsuariosModel->delete($data2)){
            $this->get();
        } else {
            echo "Ocurrio un error al eliminar el registro";
        }
        
    }
}
