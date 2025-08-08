<?php

namespace BruzDeporte\Models;

use BruzDeporte\Config\Connect\DBConnect;
use BruzDeporte\Config\Interfaces\Crud;

class CustomModel extends DBConnect implements Crud {
    // Almacena un nuevo registro de personalización
    public function store($data) {
        $sql = "INSERT INTO prodpersonalizacion (
            Descripcion, Imagen, IdCategoria
        ) VALUES (
            :Descripcion, :Imagen, :IdCategoria
        )";
        $stmt = $this->con->prepare($sql);
        return $stmt->execute([
            ':Descripcion' => $data['Descripcion'] ?? null,
            ':Imagen' => 'image.jpg',
            ':IdCategoria' => $data['IdCategoria']
        ]);
    }
    // Recupera todos los registros de personalización
    public function findAll() {
        $stmt = $this->con->query("SELECT * FROM prodpersonalizacion");
        $customItems = $stmt->fetchAll();
        // Agregar la URL base a las imágenes
        foreach ($customItems as &$item) {
            if (!empty($item['Imagen'])) {
                $item['Imagen'] = APP_BASE_URL . '/src/storage/img/customs/' . $item['Imagen'];
            }
        }
        return $customItems;
    }
    // Busca un registro de personalización por su ID
    public function find($idPersonalizacion) {
        $stmt = $this->con->prepare("SELECT * FROM prodpersonalizacion WHERE IdPersonalizacion = ?");
        $stmt->execute([$idPersonalizacion]);
        $customItem = $stmt->fetch();

        return $customItem;
    }
    // Actualiza un registro de personalización existente
    public function update($idPersonalizacion, $data) {
        $sql = "UPDATE prodpersonalizacion SET
            Descripcion = :Descripcion,
            Imagen = :Imagen,
            IdCategoria = :IdCategoria
            WHERE IdPersonalizacion = :IdPersonalizacion";
        $stmt = $this->con->prepare($sql);
        $params = [
            ':Descripcion' => $data['Descripcion'] ?? null,
            ':Imagen' => 'image.jpg',
            ':IdCategoria' => $data['IdCategoria'],
            ':IdPersonalizacion' => $idPersonalizacion
        ];
        return $stmt->execute($params);
    }
    // Elimina un registro de personalización
    public function delete($idPersonalizacion) {
        $stmt = $this->con->prepare("DELETE FROM prodpersonalizacion WHERE IdPersonalizacion = ?");
        return $stmt->execute([$idPersonalizacion]);
    }
    // Recupera todas las categorías (para listas desplegables)
    public function create() {
        $stmt = $this->con->query("SELECT * FROM categoria");
        return $stmt->fetchAll();
    }
}