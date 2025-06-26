<?php

namespace BruzDeporte\Models;

use BruzDeporte\Config\Connect\DBConnect;
use BruzDeporte\Config\Interfaces\Crud;

class ClientModel extends DBConnect implements Crud {
    // Almacena un nuevo cliente
    public function store($data) {
        $sql = "INSERT INTO cliente (
            Cedula, Nombre, Apellido, Correo, Telefono
        ) VALUES (
            :Cedula, :Nombre, :Apellido, :Correo, :Telefono
        )";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':Cedula' => $data['Cedula'],
            ':Nombre' => $data['Nombre'],
            ':Apellido' => $data['Apellido'],
            ':Correo' => $data['Correo'] ?? null,
            ':Telefono' => $data['Telefono'] ?? null
        ]);
    }
    // Recupera todos los clientes
    public function findAll() {
        $stmt = $this->con->query("SELECT * FROM cliente");
        return $stmt->fetchAll();
    }
    // Busca un cliente por su cédula
    public function find($cedula) {
        $stmt = $this->con->prepare("SELECT * FROM cliente WHERE Cedula = ?");
        $stmt->execute([$cedula]);
        return $stmt->fetch();
    }
    // Actualiza un cliente existente
    public function update($cedula, $data) {
        $sql = "UPDATE cliente SET
            Nombre = :Nombre,
            Apellido = :Apellido,
            Correo = :Correo,
            Telefono = :Telefono
            WHERE Cedula = :Cedula";
        $stmt = $this->con->prepare($sql);
        $params = [
            ':Nombre' => $data['Nombre'],
            ':Apellido' => $data['Apellido'],
            ':Correo' => $data['Correo'] ?? null,
            ':Telefono' => $data['Telefono'] ?? null,
            ':Cedula' => $cedula
        ];
        return $stmt->execute($params);
    }
    // Elimina un cliente
    public function delete($cedula) {
        $stmt = $this->con->prepare("DELETE FROM cliente WHERE Cedula = ?");
        return $stmt->execute([$cedula]);
    }
}