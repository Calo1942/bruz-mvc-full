<?php

namespace BruzDeporte\Models;

use Exception;
use BruzDeporte\config\connect\DBConnect;
use BruzDeporte\config\interfaces\Crud;
use BruzDeporte\Helpers\Validations;
use BruzDeporte\Helpers\ApiResponse;

class CategoryModel extends DBConnect implements Crud
{
    use Validations;
    use ApiResponse;
    
    // private $module_name = ["singular" => "Categoría", "plural" => "Categorías"];
    private $id_categoria;
    private $nombre;

    private function setIdCategoria($id_categoria) {
        if (self::validate_id($id_categoria) === false) {
            throw new Exception('ID de categoría inválido');
        } else {
            $this->id_categoria = $id_categoria;
        }
    }
    
    private function setNombre($nombre) {
        if (self::validate_names($nombre) === false) {
            throw new Exception('Nombre de categoría inválido');
        } else {
            $this->nombre = $nombre;
        }
    }

    private function getIdCategoria() {
        return $this->id_categoria;
    }

    private function getNombre() { 
        return $this->nombre;
    }

    public function store($data)
    {
        try {
            
            $this->setNombre($data['nombre']);  // Setter

            $sql = "INSERT INTO categoria (nombre) VALUES (:nombre)";
            $stmt = $this->con->prepare($sql);

            $stmt->bindValue(1, $this->getNombre());    // Getter

            if ($stmt->execute()) {
                // Respuesta Éxito
                return self::success($code = 201, $message = 'Categoría almacenada exitosamente', $data = null);
            } else {
                throw new Exception('Error al guardar categoría');
            }

        } catch (\Exception $e) {
            // Respuesta Error
            return self::error($code = 500, $message = 'Ocurrió un problema al almacenar la categoría', $error = $e->getMessage());
        }
    }

    public function findAll()
    {
        try {
            $stmt = $this->con->query("SELECT * FROM categoria");
            $result = $stmt->fetchAll();

            if ($result) {
                // Respuesta Éxito
                return self::success($code = 200, $message = 'Categorías extraídas exitosamente', $data = $result);
            } else {
                throw new Exception('Error al extraer categorías');
            }

    } catch (\Exception $e) {
            // Respuesta Error
            return self::error($code = 500, $message = 'Ocurrió un problema al extraer las categorías', $error = $e->getMessage());
        }
    }

    public function find($id_categoria)
    {
        try {
            $this->setIdCategoria($id_categoria);

            $stmt = $this->con->prepare("SELECT * FROM categoria WHERE id_categoria = :id_categoria");
            $stmt->bindValue(1, $this->getIdCategoria());
            $stmt->execute();
            $result = $stmt->fetch();
            
            if ($result) {
                // Respuesta Éxito
                return self::success($code = 201, $message = 'Categoría extraída exitosamente', $data = $result);
            } else {
                throw new Exception('Error al extraer la categoría');
            }

        } catch (\Exception $e) {
            // Respuesta Error
            return self::error($code = 500, $message = 'Ocurrió un problema al extraer la categoría', $error = $e->getMessage());
        }
    }

    public function update($id_categoria, $data)
    {
        try {
            $this->setIdCategoria($id_categoria);
            $this->setNombre($data['nombre']);

            $sql = "UPDATE categoria SET nombre = :nombre WHERE id_categoria = :id_categoria";
            $stmt = $this->con->prepare($sql);

            $stmt->bindValue(1, $this->getNombre());
            $stmt->bindValue(2, $this->getIdCategoria());

            $result = $stmt->execute();

            if ($result) {
                // Respuesta Éxito
                return self::success($code = 200, $message = 'Categoría editada exitosamente', $data = null);
            } else {
                throw new Exception('Error al editar la categoría');
            }

        } catch (\Exception $e) {
            // Respuesta Error
            return self::error($code = 500, $message = 'Ocurrió un problema al actualizar la categoria', $error = $e->getMessage());
        }
    }

    public function delete($id_categoria)
    {
        try {
            $this->setIdCategoria($id_categoria);

            $stmt = $this->con->prepare("DELETE FROM categoria WHERE id_categoria = :id_categoria");
            $stmt->bindValue(1, $this->getIdCategoria());
            $result = $stmt->execute();

            if ($result) {
                // Respuesta Éxito
                return self::success($code = 200, $message = 'Categoría eliminada exitosamente', $data = null);
            } else {
                throw new Exception('Error al eliminar la categoría');
            }

        } catch (\Exception $e) {
            // Respuesta Error
            return self::error($code = 500, $message = 'Ocurrió un problema al eliminar la categoria', $error = $e->getMessage());
        }
    }
}