<?php

    namespace BruzDeporte\Models;

    use BruzDeporte\Config\Connect\DBConnect;
    use BruzDeporte\Config\Interfaces\Crud;

    /**
     * Clase ClientModel
     *
     * Esta clase maneja las operaciones CRUD para la tabla 'cliente' en la base de datos.
     * Extiende de DBConnect para la conexión a la base de datos e implementa la interfaz Crud
     * para asegurar la implementación de los métodos básicos de manipulación de datos.
     */
    class ClientModel extends DBConnect implements Crud {

        /**
         * Almacena un nuevo cliente en la base de datos.
         *
         * @param array $data Un array asociativo que contiene los datos del cliente,
         * incluyendo 'Cedula', 'Nombre', 'Apellido', y opcionalmente 'Correo' y 'Telefono'.
         * @return bool True si la inserción fue exitosa, false en caso contrario.
         */
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

        /**
         * Recupera todos los clientes de la base de datos.
         *
         * @return array Un array de arrays asociativos, donde cada array representa una fila de cliente.
         */
        public function findAll() {
            $stmt = $this->con->query("SELECT * FROM cliente");
            return $stmt->fetchAll();
        }

        /**
         * Busca un cliente específico por su número de cédula.
         *
         * @param string $cedula El número de cédula del cliente a buscar.
         * @return array|false Un array asociativo que representa el cliente encontrado,
         * o false si no se encontró ningún cliente con la cédula dada.
         */
        public function find($cedula) {
            $stmt = $this->con->prepare("SELECT * FROM cliente WHERE Cedula = ?");
            $stmt->execute([$cedula]);
            return $stmt->fetch();
        }

        /**
         * Actualiza un cliente existente en la base de datos.
         *
         * @param string $cedula El número de cédula del cliente a actualizar.
         * @param array $data Un array asociativo que contiene los nuevos datos del cliente,
         * incluyendo 'Nombre', 'Apellido', y opcionalmente 'Correo' y 'Telefono'.
         * @return bool True si la actualización fue exitosa, false en caso contrario.
         */
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

        /**
         * Elimina un cliente de la base de datos.
         *
         * @param string $cedula El número de cédula del cliente a eliminar.
         * @return bool True si la eliminación fue exitosa, false en caso contrario.
         */
        public function delete($cedula) {
            $stmt = $this->con->prepare("DELETE FROM cliente WHERE Cedula = ?");
            return $stmt->execute([$cedula]);
        }
    }