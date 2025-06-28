<?php

namespace BruzDeporte\Models;

use BruzDeporte\Config\Connect\DBConnect;
use BruzDeporte\Config\Interfaces\Crud;

class ProductModel extends DBConnect implements Crud {
    
    // Almacena un nuevo producto
    public function store($data) {
        $sql = "INSERT INTO producto (
            Nombre, Descripcion, PrecioDetal, PrecioMayor, IdCategoria
        ) VALUES (
            :Nombre, :Descripcion, :PrecioDetal, :PrecioMayor, :IdCategoria
        )";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':Nombre' => $data['Nombre'],
            ':Descripcion' => $data['Descripcion'] ?? null,
            ':PrecioDetal' => $data['PrecioDetal'],
            ':PrecioMayor' => $data['PrecioMayor'] ?? null,
            ':IdCategoria' => $data['IdCategoria']
        ]);
    }

    // Recupera todos los productos con información de categoría
    public function findAll() {
        $sql = "SELECT p.*, c.Nombre as NombreCategoria 
                FROM producto p 
                LEFT JOIN categoria c ON p.IdCategoria = c.IdCategoria";
        $stmt = $this->con->query($sql);
        $productos = $stmt->fetchAll();

        return $productos;
    }

    // Busca un producto por su ID
    public function find($idProducto) {
        $sql = "SELECT p.*, c.Nombre as NombreCategoria 
                FROM producto p 
                LEFT JOIN categoria c ON p.IdCategoria = c.IdCategoria 
                WHERE p.IdProducto = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$idProducto]);
        $producto = $stmt->fetch();

        return $producto;
    }
    
    // Actualiza un producto existente
    public function update($idProducto, $data) {
        $sql = "UPDATE producto SET
            Nombre = :Nombre,
            Descripcion = :Descripcion,
            PrecioDetal = :PrecioDetal,
            PrecioMayor = :PrecioMayor,
            IdCategoria = :IdCategoria
            WHERE IdProducto = :IdProducto";
        $stmt = $this->con->prepare($sql);
        $params = [
            ':Nombre' => $data['Nombre'],
            ':Descripcion' => $data['Descripcion'] ?? null,
            ':PrecioDetal' => $data['PrecioDetal'],
            ':PrecioMayor' => $data['PrecioMayor'] ?? null,
            ':IdCategoria' => $data['IdCategoria'],
            ':IdProducto' => $idProducto
        ];
        return $stmt->execute($params);
    }
    
    // Elimina un producto
    public function delete($idProducto) {
        $stmt = $this->con->prepare("DELETE FROM producto WHERE IdProducto = ?");
        return $stmt->execute([$idProducto]);
    }
}