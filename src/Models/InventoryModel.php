<?php

namespace BruzDeporte\Models;

use BruzDeporte\Config\Connect\DBConnect;
use BruzDeporte\Config\Interfaces\Crud;

class InventoryModel extends DBConnect implements Crud {
    // Almacena un nuevo registro de inventario
    public function store($data) {
        $sql = "INSERT INTO Variante (
            Stock, IdProducto, IdTalla, Color
        ) VALUES (
            :Stock, :IdProducto, :IdTalla, :Color
        )";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':Stock' => $data['Stock'],
            ':IdProducto' => $data['IdProducto'],
            ':IdTalla' => $data['IdTalla'],
            ':Color' => $data['Color']
        ]);
    }
    
    // Recupera todos los registros de inventario
    public function findAll() {
        $sql = "SELECT i.*, p.Nombre as NombreProducto, t.Nombre as NombreTalla 
                FROM Variante i 
                LEFT JOIN Producto p ON i.IdProducto = p.IdProducto 
                LEFT JOIN Talla t ON i.IdTalla = t.IdTalla";
        $stmt = $this->con->query($sql);
        return $stmt->fetchAll();
    }
    
    // Busca un registro de Variante por su ID
    public function find($idInventario) {
        $sql = "SELECT i.*, p.Nombre as NombreProducto, t.Nombre as NombreTalla 
                FROM Variante i 
                LEFT JOIN Producto p ON i.IdProducto = p.IdProducto 
                LEFT JOIN Talla t ON i.IdTalla = t.IdTalla 
                WHERE i.IdVariante = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$idInventario]);
        return $stmt->fetch();
    }
    
    // Actualiza un registro de Variante existente
    public function update($idInventario, $data) {
        $sql = "UPDATE Variante SET
            Stock = :Stock,
            IdProducto = :IdProducto,
            IdTalla = :IdTalla,
            Color = :Color
            WHERE IdVariante = :IdInventario";
        $stmt = $this->con->prepare($sql);
        $params = [
            ':Stock' => $data['Stock'],
            ':IdProducto' => $data['IdProducto'],
            ':IdTalla' => $data['IdTalla'],
            ':Color' => $data['Color'],
            ':IdInventario' => $idInventario
        ];
        return $stmt->execute($params);
    }
    
    // Elimina un registro de inventario
    public function delete($idInventario) {
        $stmt = $this->con->prepare("DELETE FROM Variante WHERE IdVariante = ?");
        return $stmt->execute([$idInventario]);
    }
    
    // Métodos adicionales específicos para inventario
    
    // Buscar Variante por producto
    public function findByProduct($idProducto) {
        $sql = "SELECT i.*, p.Nombre as NombreProducto, t.Nombre as NombreTalla 
                FROM Variante i 
                LEFT JOIN Producto p ON i.IdProducto = p.IdProducto 
                LEFT JOIN Talla t ON i.IdTalla = t.IdTalla 
                WHERE i.IdProducto = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$idProducto]);
        return $stmt->fetchAll();
    }
    
    // Buscar Variante por talla
    public function findBySize($idTalla) {
        $sql = "SELECT i.*, p.Nombre as NombreProducto, t.Nombre as NombreTalla 
                FROM Variante i 
                LEFT JOIN Producto p ON i.IdProducto = p.IdProducto 
                LEFT JOIN Talla t ON i.IdTalla = t.IdTalla 
                WHERE i.IdTalla = ?";
        $stmt = $this->con->prepare($sql);
        $stmt->execute([$idTalla]);
        return $stmt->fetchAll();
    }
    
    // Actualizar stock
    public function updateStock($idInventario, $nuevoStock) {
        $sql = "UPDATE Variante SET Stock = ? WHERE IdVariante = ?";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([$nuevoStock, $idInventario]);
    }
    
    // Obtener productos con stock bajo (menos de 10 unidades)
    public function getLowStock() {
        $sql = "SELECT i.*, p.Nombre as NombreProducto, t.Nombre as NombreTalla 
                FROM Variante i 
                LEFT JOIN Producto p ON i.IdProducto = p.IdProducto 
                LEFT JOIN Talla t ON i.IdTalla = t.IdTalla 
                WHERE i.Stock < 10";
        $stmt = $this->con->query($sql);
        return $stmt->fetchAll();
    }
}