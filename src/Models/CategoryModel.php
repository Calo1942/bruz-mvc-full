<?php

    namespace BruzDeporte\Models;

    use BruzDeporte\Config\Connect\DBConnect;
    use BruzDeporte\Config\Interfaces\Crud;

    /**
     * Clase CategoryModel
     *
     * Esta clase maneja las operaciones CRUD para la tabla 'categoria' en la base de datos.
     * Extiende de DBConnect para la conexión a la base de datos e implementa la interfaz Crud
     * para asegurar la implementación de los métodos básicos de manipulación de datos.
     */
    class CategoryModel extends DBConnect implements Crud {

        /**
         * Almacena una nueva categoría en la base de datos.
         *
         * @param array $data Un array asociativo que contiene los datos de la categoría,
         * donde la clave 'Nombre' es requerida.
         * @return bool True si la inserción fue exitosa, false en caso contrario.
         */
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

        /**
         * Recupera todas las categorías de la base de datos.
         *
         * @return array Un array de arrays asociativos, donde cada array representa una fila de categoría.
         */
        public function findAll() {
            $stmt = $this->con->query("SELECT * FROM categoria");
            return $stmt->fetchAll();
        }

        /**
         * Busca una categoría específica por su ID.
         *
         * @param int $idCategoria El ID de la categoría a buscar.
         * @return array|false Un array asociativo que representa la categoría encontrada,
         * o false si no se encontró ninguna categoría con el ID dado.
         */
        public function find($idCategoria) {
            $stmt = $this->con->prepare("SELECT * FROM categoria WHERE IdCategoria = ?");
            $stmt->execute([$idCategoria]);
            return $stmt->fetch();
        }

        /**
         * Actualiza una categoría existente en la base de datos.
         *
         * @param int $idCategoria El ID de la categoría a actualizar.
         * @param array $data Un array asociativo que contiene los nuevos datos de la categoría,
         * donde la clave 'Nombre' es requerida.
         * @return bool True si la actualización fue exitosa, false en caso contrario.
         */
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

        /**
         * Elimina una categoría de la base de datos.
         *
         * @param int $idCategoria El ID de la categoría a eliminar.
         * @return bool True si la eliminación fue exitosa, false en caso contrario.
         */
        public function delete($idCategoria) {
            $stmt = $this->con->prepare("DELETE FROM categoria WHERE IdCategoria = ?");
            return $stmt->execute([$idCategoria]);
        }
    }