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
        echo json_encode($this->UsuariosModel->getAll());
    }

    /**
     * Metodo para obetener un registro de la base de datos
     */
    public function getById($id)
    {
        echo json_encode($this->UsuariosModel->getById($id));
    }

    /**
     * Metodo para ingresar registros en la base de datos
     */
    public function post()
    {
        $this->UsuariosModel->ingresar($this->getData());
        $this->get();
    }

    /**
     * Metodo para editar registros
     */
    public function put()
    {
        $data2 = [$this->getData()[1], $this->getData()[2], $this->getData()[0]];
        $this->UsuariosModel->update($data2);
        $this->get();
    }

    /**
     * Metodo para eliminar registros.
     */
    public function delete()
    {
        $data2 = [$this->getData()[0]];
        $this->UsuariosModel->delete($data2);
        $this->get();
    }
}
