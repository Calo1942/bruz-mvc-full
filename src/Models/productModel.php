<?php

    namespace BruzDeporte\Models;

    use BruzDeporte\Config\Connect\DBConnect;
    use BruzDeporte\Config\Interfaces\Crud;
    use PDO;

    class ProductModel extends DBConnect implements Crud {

        // CREATE
        public function store($data) {
            $sql = "INSERT INTO producto (
                Nombre, Descripcion, Talla, Imagen, Detal, Mayor, Stock, IdCategoria
            ) VALUES (
                :Nombre, :Descripcion, :Talla, :Imagen, :Detal, :Mayor, :Stock, :IdCategoria
            )";
            $stmt = $this->con->prepare($sql);
            return $stmt->execute([
                ':Nombre' => $data['Nombre'],
                ':Descripcion' => $data['Descripcion'],
                ':Talla' => $data['Talla'],
                ':Imagen' => $data['Imagen'] ?? 'Imagen.jpg',
                ':Detal' => $data['Detal'],
                ':Mayor' => $data['Mayor'] ?? null,
                ':Stock' => $data['Stock'] ?? 0,
                ':IdCategoria' => $data['IdCategoria']
            ]);
        }

        // READ
        public function findAll() {
            $stmt = $this->con->query("SELECT * FROM producto");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function find($id) {
            $stmt = $this->con->prepare("SELECT * FROM producto WHERE IdProducto = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // UPDATE
        public function update($id, $data) {
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
                ':Descripcion' => $data['Descripcion'],
                ':Talla' => $data['Talla'],
                ':Imagen' => $data['Imagen'] ?? 'Imagen.jpg',
                ':Detal' => $data['Detal'],
                ':Mayor' => $data['Mayor'] ?? null,
                ':Stock' => $data['Stock'] ?? 0,
                ':IdCategoria' => $data['IdCategoria'],
                ':IdProducto' => $id
            ];
            return $stmt->execute($params);
        }

        // DELETE
        public function delete($id) {
            $stmt = $this->con->prepare("DELETE FROM producto WHERE IdProducto = ?");
            return $stmt->execute([$id]);
        }

        public function getImage($id) {
            $stmt = $this->con->prepare("SELECT Imagen FROM producto WHERE IdProducto = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }