<?php

namespace BruzDeporte\Models;

use BruzDeporte\Config\Connect\DBConnect;
use BruzDeporte\Config\Interfaces\Crud;

class SizeModel extends DBConnect implements Crud {
    // Almacena una nueva talla
    public function store($data) {
        $sql = "INSERT INTO talla (
            Nombre
        ) VALUES (
            :Nombre
        )";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':Nombre' => $data['Nombre']
        ]);
    }
    // Recupera todas las tallas
    public function findAll() {
        $stmt = $this->con->query("SELECT * FROM talla");
        return $stmt->fetchAll();
    }
    // Busca una talla por su ID
    public function find($idTalla) {
        $stmt = $this->con->prepare("SELECT * FROM talla WHERE IdTalla = ?");
        $stmt->execute([$idTalla]);
        return $stmt->fetch();
    }
    // Actualiza una talla existente
    public function update($idTalla, $data) {
        $sql = "UPDATE talla SET
            Nombre = :Nombre
            WHERE IdTalla = :IdTalla";
        $stmt = $this->con->prepare($sql);
        $params = [
            ':Nombre' => $data['Nombre'],
            ':IdTalla' => $idTalla
        ];
        return $stmt->execute($params);
    }
    // Elimina una talla
    public function delete($idTalla) {
        $stmt = $this->con->prepare("DELETE FROM talla WHERE IdTalla = ?");
        return $stmt->execute([$idTalla]);
    }
}