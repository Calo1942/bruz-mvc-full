<?php

namespace BruzDeporte\Models;

use Exception;
use BruzDeporte\config\connect\DBConnect;
use BruzDeporte\config\interfaces\Crud;
use BruzDeporte\Helpers\Validations;

class CategoryModel extends DBConnect implements Crud
{
    use Validations;
    
    private $id_categoria;
    private $nombre;

    public function setIdCategoria($id_categoria) {

        if (self::validate_id($id_categoria) === false) {
            //throw new Exception('ID de categoría inválido');;
            return "<script>alert('ID de categoría inválido');</script>";
        } else {
            $this->id_categoria = $id_categoria;
        }
        
    }
    
    public function setNombre($nombre) {
        if (self::validate_names($nombre) === false) {
            //throw new Exception('Nombre inválido');;
            return "<script>alert('Nombre inválido');</script>";
        } else {
            $this->nombre = $nombre;
        }
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function store($data)
    {
        try {
            $this->setNombre($data['nombre'] ?? '');

            if (empty($this->getNombre())) {
                throw new Exception('Nombre requerido');
            }

            $sql = "INSERT INTO categoria (nombre) VALUES (:nombre)";
            $stmt = $this->con->prepare($sql);
            return $stmt->execute([':nombre' => $this->getNombre()]);

        } catch (\Exception $e) {
            return '<script>alert("Ocurrió un problema al almacenar los datos") ;</script>';
            //return false;
        }
    }

    public function findAll()
    {
        try {
            $stmt = $this->con->query("SELECT * FROM categoria");
            return $stmt->fetchAll();

        } catch (\Exception $e) {
            return '<script>alert("Ocurrió un problema al extraer los datos") ;</script>';
            //return false;
        }
    }

    public function find($id_categoria)
    {
        try {
            $this->setIdCategoria($id_categoria);

            $stmt = $this->con->prepare("SELECT * FROM categoria WHERE id_categoria = :id_categoria");
            $stmt->execute([':id_categoria' => $this->getIdCategoria()]);
            $result = $stmt->fetch();

            if ($result) {
                $this->setNombre($result['nombre']);
            }
            return $result;

        }catch (\Exception $e) {
            return '<script>alert("Ocurrió un problema al extraer el dato") ;</script>';
            //return false;
        }
    }

    public function update($id_categoria, $data)
    {
        try {
            $this->setIdCategoria($id_categoria);
            $this->setNombre($data['nombre'] ?? null);

            if (empty($this->getNombre())) {
                return false; 
            }

            $sql = "UPDATE categoria SET nombre = :nombre WHERE id_categoria = :id_categoria";
            $stmt = $this->con->prepare($sql);

            return $stmt->execute([
                ':nombre' => $this->getNombre(),
                ':id_categoria' => $this->getIdCategoria()
            ]);
        } catch (\Exception $e) {
            return '<script>alert("Ocurrió un problema al actualizar el dato") ;</script>';
            //return false; 
        }
    }

    public function delete($id_categoria)
    {
        try {
            $this->setIdCategoria($id_categoria);

            $stmt = $this->con->prepare("DELETE FROM categoria WHERE id_categoria = :id_categoria");
            return $stmt->execute([':id_categoria' => $this->getIdCategoria()]);

        } catch (\Exception $e) {
            return '<script>alert("Ocurrió un problema al eliminar el dato") ;</script>';
            //return false;
        }
    }
}