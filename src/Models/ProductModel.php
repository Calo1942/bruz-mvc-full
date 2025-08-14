<?php

namespace BruzDeporte\Models;

use BruzDeporte\config\connect\DBConnect;
use BruzDeporte\config\interfaces\Crud;

class ProductModel extends DBConnect implements Crud {
    private $IdProducto;
    private $Nombre;
    private $Descripcion;
    private $PrecioDetal;
    private $PrecioMayor;
    private $IdCategoria;

    
    public function setProducto(
        $IdProducto = null,
        $Nombre = null,
        $Descripcion = null,
        $PrecioDetal = null,
        $PrecioMayor = null,
        $IdCategoria = null
    ) {
        if ($IdProducto !== null)   $this->IdProducto   = $IdProducto;
        if ($Nombre !== null)       $this->Nombre       = $Nombre;
        if ($Descripcion !== null)  $this->Descripcion  = $Descripcion;
        if ($PrecioDetal !== null)  $this->PrecioDetal  = $PrecioDetal;
        if ($PrecioMayor !== null)  $this->PrecioMayor  = $PrecioMayor;
        if ($IdCategoria !== null)  $this->IdCategoria  = $IdCategoria;

        return $this; 
    }

    public function getProducto($field = null) {
            $data = [
                'IdProducto'   => $this->IdProducto,
                'Nombre'       => $this->Nombre,
                'Descripcion'  => $this->Descripcion,
                'PrecioDetal'  => $this->PrecioDetal,
                'PrecioMayor'  => $this->PrecioMayor,
                'IdCategoria'  => $this->IdCategoria
            ];

            if ($field === null) {
                return $data;
            }

            return array_key_exists($field, $data) ? $data[$field] : null;
        }

    public function store($data) {
        try {
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
        } catch (\PDOException $e) {
        echo "Error en Producto: " . $e->getMessage();
        return false;
        }
    }

    public function findAll() {
            $sql = "SELECT p.*, c.Nombre as NombreCategoria 
                FROM producto p 
                LEFT JOIN categoria c ON p.IdCategoria = c.IdCategoria";
        try{
            $stmt = $this->con->query($sql);
            $productos = $stmt->fetchAll();
            return $productos;
        } catch (\PDOException $e) {
            echo "Error al obtener productos: " . $e->getMessage();
            return false;
        }
    }

    public function find($idProducto) {
        $sql = "SELECT p.*, c.Nombre as NombreCategoria 
                FROM producto p 
                LEFT JOIN categoria c ON p.IdCategoria = c.IdCategoria 
                WHERE p.IdProducto = ?";
        try{
            $stmt = $this->con->prepare($sql);
            $stmt->execute([$idProducto]);
            $producto = $stmt->fetch();
            return $producto;
        } catch (\PDOException $e) {
            error_log("Error al buscar producto: " . $e->getMessage());
            return false;
        }
    }

    public function update($idProducto, $data) {
        $sql = "UPDATE producto SET
            Nombre = :Nombre,
            Descripcion = :Descripcion,
            PrecioDetal = :PrecioDetal,
            PrecioMayor = :PrecioMayor,
            IdCategoria = :IdCategoria
            WHERE IdProducto = :IdProducto";
        try {
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
        } catch (\PDOException $e) {
            echo "Error al actualizar producto: " . $e->getMessage();
            return false;
    }
    }
    
    public function delete($idProducto) {
        try {
        $stmt = $this->con->prepare("DELETE FROM producto WHERE IdProducto = ?");
        return $stmt->execute([$idProducto]);
        } catch (\PDOException $e) {
            echo "Error al eliminar producto: " . $e->getMessage();
            return false;
        }
    }
}