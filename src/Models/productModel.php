<?php

namespace BruzDeporte\Models;

use BruzDeporte\Config\Connect\DBConnect;
use BruzDeporte\Config\Interfaces\Crud;

class ProductModel extends DBConnect implements Crud {
    // Almacena un nuevo producto
    public function store($data) {
        $sql = "INSERT INTO producto (
            Nombre, Descripcion, Talla, Imagen, Detal, Mayor, Stock, IdCategoria
        ) VALUES (
            :Nombre, :Descripcion, :Talla, :Imagen, :Detal, :Mayor, :Stock, :IdCategoria
        )";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':Nombre' => $data['Nombre'],
            ':Descripcion' => $data['Descripcion'] ?? null,
            ':Talla' => $data['Talla'] ?? null,
            ':Imagen' => $data['Imagen'] ?? null,
            ':Detal' => $data['Detal'] ?? null,
            ':Mayor' => $data['Mayor'] ?? null,
            ':Stock' => $data['Stock'] ?? 0,
            ':IdCategoria' => $data['IdCategoria']
        ]);
    }
    // Recupera todos los productos
    public function findAll() {
        $stmt = $this->con->query("SELECT * FROM producto");
        $productos = $stmt->fetchAll();
        $uploadDir = __DIR__ . '/../storage/img/products/'; 

        foreach ($productos as &$producto) {
            if (!empty($producto['Imagen'])) {
                $producto['Imagen'] = APP_BASE_URL . '/src/storage/img/products/' . $producto['Imagen'];
            }
        }

        return $productos;
    }
    // Busca un producto por su ID
    public function find($idProducto) {
        $stmt = $this->con->prepare("SELECT * FROM producto WHERE IdProducto = ?");
        $stmt->execute([$idProducto]);
        $producto = $stmt->fetch();

        if ($producto && !empty($producto['Imagen'])) {
            $producto['Imagen'] = APP_BASE_URL . '/src/storage/img/products/' . $producto['Imagen'];
        }

        return $producto;
    }
    // Actualiza un producto existente
    public function update($idProducto, $data) {
        $sql = "UPDATE producto SET
            Nombre = :Nombre,
            Descripcion = :Descripcion,
            Talla = :Talla,
            Imagen = :Imagen,
            Detal = :Detal,
            Mayor = :Mayor,
            Stock = :Stock,
            IdCategoria = :IdCategoria
            WHERE IdProducto = :IdProducto";
        $stmt = $this->con->prepare($sql);
        $params = [
            ':Nombre' => $data['Nombre'],
            ':Descripcion' => $data['Descripcion'] ?? null,
            ':Talla' => $data['Talla'] ?? null,
            ':Imagen' => $data['Imagen'] ?? null,
            ':Detal' => $data['Detal'] ?? null,
            ':Mayor' => $data['Mayor'] ?? null,
            ':Stock' => $data['Stock'] ?? 0,
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