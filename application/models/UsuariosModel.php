<?php

/**
 * Modelo de la tabla usuarios
 */
class UsuariosModel extends CI_Model
{
    /**
     * Metodo para obetener todos los registros de la tabla
     */
    public function getAll()
    {
        return $this->db->get('usuarios')->result();
    }

    /**
     * Metodo para ingresar un registro a la tabla
     */
    public function ingresar($datos)
    {
        $sql = "INSERT INTO usuarios(nombre,apellido) VALUES(?,?)";
        try {
            $this->db->query($sql, $datos);
            return true;
        } catch (PDOException $th) {
            return false;
        }
        
    }

    /**
     * Metodo para eliminar un registro de la tabla
     */
    public function delete($id)
    {
        $sql = "DELETE FROM usuarios WHERE id_usuarios = ?";
        try {
            $this->db->query($sql, $id);
            return true;
        } catch (PDOException $th) {
            return false;
        }
        
    }

    /**
     * Metodo para obtener un registro de la tabla basado en su id
     */
    public function getById($id)
    {
        $sql = "SELECT * FROM usuarios WHERE id_usuarios = ?";
        try {
            return $this->db->query($sql, $id)->row();
        } catch (PDOException $th) {
            return false;
        }
        
    }

    /**
     * Metodo para actualizar un registro de la tabla
     */
    public function update($datos)
    {
        $sql = "UPDATE usuarios SET nombre = ?,apellido = ? WHERE id_usuarios = ?";
        try {
            $this->db->query($sql, $datos);
            return true;
        } catch (PDOException $th) {
            return false;
        }
    }
}
