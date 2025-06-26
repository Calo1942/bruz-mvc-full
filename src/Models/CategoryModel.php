<?php

namespace BruzDeporte\Models;

use BruzDeporte\Config\Connect\DBConnect;
use BruzDeporte\Config\Interfaces\Crud;

class CategoryModel extends DBConnect implements Crud {
    // Almacena una nueva categoría
    public function store($data) {
        $sql = "INSERT INTO categoria (
            Nombre
        ) VALUES (
            :Nombre
        )";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':Nombre' => $data['Nombre']
        ]);
    }
    // Recupera todas las categorías
    public function findAll() {
        $stmt = $this->con->query("SELECT * FROM categoria");
        return $stmt->fetchAll();
    }
    // Busca una categoría por su ID
    public function find($idCategoria) {
        $stmt = $this->con->prepare("SELECT * FROM categoria WHERE IdCategoria = ?");
        $stmt->execute([$idCategoria]);
        return $stmt->fetch();
    }
    // Actualiza una categoría existente
    public function update($idCategoria, $data) {
        $sql = "UPDATE categoria SET
            Nombre = :Nombre
            WHERE IdCategoria = :IdCategoria";
        $stmt = $this->con->prepare($sql);
        $params = [
            ':Nombre' => $data['Nombre'],
            ':IdCategoria' => $idCategoria
        ];
        return $stmt->execute($params);
    }
    // Elimina una categoría
    public function delete($idCategoria) {
        $stmt = $this->con->prepare("DELETE FROM categoria WHERE IdCategoria = ?");
        return $stmt->execute([$idCategoria]);
    }
}