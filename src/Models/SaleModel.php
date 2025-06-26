<?php

namespace BruzDeporte\Models;

use BruzDeporte\Config\Connect\DBConnect;
use BruzDeporte\Config\Interfaces\Crud;

class SaleModel extends DBConnect implements Crud {
    // Almacena una nueva venta
    public function store($data) {
        $sql = "INSERT INTO venta (
            IdPago, EstadoVenta, EstadoEnvio, TipoVenta
        ) VALUES (
            :IdPago, :EstadoVenta, :EstadoEnvio, :TipoVenta
        )";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':IdPago' => $data['IdPago'],
            ':EstadoVenta' => $data['EstadoVenta'],
            ':EstadoEnvio' => $data['EstadoEnvio'],
            ':TipoVenta' => $data['TipoVenta']
        ]);
    }
    // Recupera todas las ventas
    public function findAll() {
        $stmt = $this->con->query("SELECT * FROM venta");
        return $stmt->fetchAll();
    }
    // Busca una venta por su ID
    public function find($idVenta) {
        $stmt = $this->con->prepare("SELECT * FROM venta WHERE IdVenta = ?");
        $stmt->execute([$idVenta]);
        return $stmt->fetch();
    }
    // Actualiza una venta existente
    public function update($idVenta, $data) {
        $sql = "UPDATE venta SET
            IdPago = :IdPago,
            EstadoVenta = :EstadoVenta,
            EstadoEnvio = :EstadoEnvio,
            TipoVenta = :TipoVenta
            WHERE IdVenta = :IdVenta";
        $stmt = $this->con->prepare($sql);
        $params = [
            ':IdPago' => $data['IdPago'],
            ':EstadoVenta' => $data['EstadoVenta'],
            ':EstadoEnvio' => $data['EstadoEnvio'],
            ':TipoVenta' => $data['TipoVenta'],
            ':IdVenta' => $idVenta
        ];
        return $stmt->execute($params);
    }
    // Elimina una venta
    public function delete($idVenta) {
        $stmt = $this->con->prepare("DELETE FROM venta WHERE IdVenta = ?");
        return $stmt->execute([$idVenta]);
    }
}