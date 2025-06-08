<?php

    namespace BruzDeporte\Models;

    use BruzDeporte\Config\Connect\DBConnect;
    use BruzDeporte\Config\Interfaces\Crud;
    use PDO;

    class ClientModel extends DBConnect implements Crud {

        // CREATE
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

        // READ
        public function findAll() {
            $stmt = $this->con->query("SELECT * FROM cliente");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function find($cedula) {
            $stmt = $this->con->prepare("SELECT * FROM cliente WHERE Cedula = ?");
            $stmt->execute([$cedula]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // UPDATE
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

        // DELETE
        public function delete($cedula) {
            $stmt = $this->con->prepare("DELETE FROM cliente WHERE Cedula = ?");
            return $stmt->execute([$cedula]);
        }
    }