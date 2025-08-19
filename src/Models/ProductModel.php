<?php

namespace BruzDeporte\Models;

use BruzDeporte\config\connect\DBConnect;
use BruzDeporte\config\interfaces\Crud;

class ProductModel extends DBConnect implements Crud {
    private $id_producto;
    private $nombre;
    private $descripcion;
    private $precio_detal;
    private $precio_mayor;
    private $id_categoria;

    
    public function setProducto(
        $id_producto = null,
        $nombre = null,
        $descripcion = null,
        $precio_detal = null,
        $precio_mayor = null,
        $id_categoria = null
    ) {
        if ($id_producto !== null)   $this->id_producto   = $id_producto;
        if ($nombre !== null)       $this->nombre       = $nombre;
        if ($descripcion !== null)  $this->descripcion  = $descripcion;
        if ($precio_detal !== null)  $this->precio_detal  = $precio_detal;
        if ($precio_mayor !== null)  $this->precio_mayor  = $precio_mayor;
        if ($id_categoria !== null)  $this->id_categoria  = $id_categoria;

        return $this;
    }

    public function getProducto($field = null) {
            $data = [
                'id_producto'   => $this->id_producto,
                'nombre'       => $this->nombre,
                'descripcion'  => $this->descripcion,
                'precio_detal'  => $this->precio_detal,
                'precio_mayor'  => $this->precio_mayor,
                'id_categoria'  => $this->id_categoria
            ];

            if ($field === null) {
                return $data;
            }

            return array_key_exists($field, $data) ? $data[$field] : null;
        }

    public function store($data) {
        try {
        $sql = "INSERT INTO producto (
            nombre, descripcion, precio_detal, precio_mayor, id_categoria
        ) VALUES (
            :nombre, :descripcion, :precio_detal, :precio_mayor, :id_categoria
        )";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':nombre' => $data['nombre'],
            ':descripcion' => $data['descripcion'] ?? null,
            ':precio_detal' => $data['precio_detal'],
            ':precio_mayor' => $data['precio_mayor'] ?? null,
            ':id_categoria' => $data['id_categoria']
        ]);
        } catch (\PDOException $e) {
        echo "Error en Producto: " . $e->getMessage();
        return false;
        }
    }

    public function findAll() {
            $sql = "SELECT p.*, c.nombre as nombre_categoria 
                FROM producto p 
                LEFT JOIN categoria c ON p.id_categoria = c.id_categoria";
        try{
            $stmt = $this->con->query($sql);
            $Productos = $stmt->fetchAll();
            return $Productos;
        } catch (\PDOException $e) {
            echo "Error al obtener Productos: " . $e->getMessage();
            return false;
        }
    }

    public function find($id_producto) {
        $sql = "SELECT p.*, c.nombre as nombre_categoria 
                FROM producto p 
                LEFT JOIN categoria c ON p.id_categoria = c.id_categoria 
                WHERE p.id_producto = ?";
        try{
            $stmt = $this->con->prepare($sql);
            $stmt->execute([$id_producto]);
            $Producto = $stmt->fetch();
            return $Producto;
        } catch (\PDOException $e) {
            error_log("Error al buscar Producto: " . $e->getMessage());
            return false;
        }
    }

    public function update($id_producto, $data) {
        $sql = "UPDATE producto SET
            nombre = :nombre,
            descripcion = :descripcion,
            precio_detal = :precio_detal,
            precio_mayor = :precio_mayor,
            id_categoria = :id_categoria
            WHERE id_producto = :id_producto";
        try {
        $stmt = $this->con->prepare($sql);
        $params = [
            ':nombre' => $data['nombre'],
            ':descripcion' => $data['descripcion'] ?? null,
            ':precio_detal' => $data['precio_detal'],
            ':precio_mayor' => $data['precio_mayor'] ?? null,
            ':id_categoria' => $data['id_categoria'],
            ':id_producto' => $id_producto
        ];
        return $stmt->execute($params);
        } catch (\PDOException $e) {
            echo "Error al actualizar Producto: " . $e->getMessage();
            return false;
    }
    }
    
    public function delete($id_producto) {
        try {
        $stmt = $this->con->prepare("DELETE FROM producto WHERE id_producto = ?");
        return $stmt->execute([$id_producto]);
        } catch (\PDOException $e) {
            echo "Error al eliminar Producto: " . $e->getMessage();
            return false;
        }
    }
}