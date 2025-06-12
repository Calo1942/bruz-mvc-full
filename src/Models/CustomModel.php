<?php

    namespace BruzDeporte\Models;

    use BruzDeporte\Config\Connect\DBConnect;
    use BruzDeporte\Config\Interfaces\Crud;

    /**
     * Clase CustomModel
     *
     * Esta clase extiende DBConnect e implementa la interfaz Crud,
     * proporcionando funcionalidades CRUD para la tabla 'prodpersonalizacion'.
     */
    class CustomModel extends DBConnect implements Crud {

        /**
         * Almacena un nuevo registro en la tabla 'prodpersonalizacion'.
         *
         * @param array $data Un array asociativo con los datos a insertar.
         * Debe contener 'Descripcion', 'Imagen' y 'IdCategoria'.
         * @return bool True en caso de éxito, false en caso de error.
         */
        public function store($data) {
            $sql = "INSERT INTO prodpersonalizacion (
                Descripcion, Imagen, IdCategoria
            ) VALUES (
                :Descripcion, :Imagen, :IdCategoria
            )";
            $stmt = $this->con->prepare($sql);
            return $stmt->execute([
                ':Descripcion' => $data['Descripcion'] ?? null, // Valor nulo si no se proporciona 'Descripcion'
                ':Imagen' => $data['Imagen'] ?? null,         // Valor nulo si no se proporciona 'Imagen'
                ':IdCategoria' => $data['IdCategoria']
            ]);
        }

        /**
         * Recupera todos los registros de la tabla 'prodpersonalizacion'.
         *
         * @return array Un array de arrays asociativos, donde cada array representa una fila.
         */
        public function findAll() {
            $stmt = $this->con->query("SELECT * FROM prodpersonalizacion");
            return $stmt->fetchAll();
        }

        /**
         * Recupera un registro específico de la tabla 'prodpersonalizacion' por su ID.
         *
         * @param int $idPersonalizacion El ID del registro a buscar.
         * @return array|false Un array asociativo que representa la fila encontrada, o false si no se encuentra.
         */
        public function find($idPersonalizacion) {
            $stmt = $this->con->prepare("SELECT * FROM prodpersonalizacion WHERE IdPersonalizacion = ?");
            $stmt->execute([$idPersonalizacion]);
            return $stmt->fetch();
        }

        /**
         * Actualiza un registro existente en la tabla 'prodpersonalizacion'.
         *
         * @param int $idPersonalizacion El ID del registro a actualizar.
         * @param array $data Un array asociativo con los nuevos datos.
         * Debe contener 'Descripcion', 'Imagen' y 'IdCategoria'.
         * @return bool True en caso de éxito, false en caso de error.
         */
        public function update($idPersonalizacion, $data) {
            $sql = "UPDATE prodpersonalizacion SET
                Descripcion = :Descripcion,
                Imagen = :Imagen,
                IdCategoria = :IdCategoria
                WHERE IdPersonalizacion = :IdPersonalizacion";
            $stmt = $this->con->prepare($sql);
            $params = [
                ':Descripcion' => $data['Descripcion'] ?? null,
                ':Imagen' => $data['Imagen'] ?? null,
                ':IdCategoria' => $data['IdCategoria'],
                ':IdPersonalizacion' => $idPersonalizacion
            ];
            return $stmt->execute($params);
        }

        /**
         * Elimina un registro de la tabla 'prodpersonalizacion' por su ID.
         *
         * @param int $idPersonalizacion El ID del registro a eliminar.
         * @return bool True en caso de éxito, false en caso de error.
         */
        public function delete($idPersonalizacion) {
            $stmt = $this->con->prepare("DELETE FROM prodpersonalizacion WHERE IdPersonalizacion = ?");
            return $stmt->execute([$idPersonalizacion]);
        }

        /**
         * Recupera todos los registros de la tabla 'categoria'.
         * Este método puede ser utilizado para poblar listas desplegables o similares.
         *
         * @return array Un array de arrays asociativos, donde cada array representa una fila.
         */
        public function create() {
            $stmt = $this->con->query("SELECT * FROM categoria");
            return $stmt->fetchAll();
        }
    }