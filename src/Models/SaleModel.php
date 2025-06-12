<?php

    namespace BruzDeporte\Models;

    use BruzDeporte\Config\Connect\DBConnect;
    use BruzDeporte\Config\Interfaces\Crud;

    /**
     * Clase SaleModel
     *
     * Esta clase maneja las operaciones CRUD para la tabla 'venta' en la base de datos.
     * Extiende de DBConnect para la conexión a la base de datos e implementa la interfaz Crud
     * para asegurar la implementación de los métodos básicos de manipulación de datos.
     */
    class SaleModel extends DBConnect implements Crud {

        /**
         * Almacena una nueva venta en la base de datos.
         *
         * @param array $data Un array asociativo que contiene los datos de la venta,
         * incluyendo 'IdPago', 'EstadoVenta', 'EstadoEnvio' y 'TipoVenta'.
         * @return bool True si la inserción fue exitosa, false en caso contrario.
         */
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

        /**
         * Recupera todas las ventas de la base de datos.
         *
         * @return array Un array de arrays asociativos, donde cada array representa una fila de venta.
         */
        public function findAll() {
            $stmt = $this->con->query("SELECT * FROM venta");
            return $stmt->fetchAll();
        }

        /**
         * Busca una venta específica por su ID.
         *
         * @param int $idVenta El ID de la venta a buscar.
         * @return array|false Un array asociativo que representa la venta encontrada,
         * o false si no se encontró ninguna venta con el ID dado.
         */
        public function find($idVenta) {
            $stmt = $this->con->prepare("SELECT * FROM venta WHERE IdVenta = ?");
            $stmt->execute([$idVenta]);
            return $stmt->fetch();
        }

        /**
         * Actualiza una venta existente en la base de datos.
         *
         * @param int $idVenta El ID de la venta a actualizar.
         * @param array $data Un array asociativo que contiene los nuevos datos de la venta,
         * incluyendo 'IdPago', 'EstadoVenta', 'EstadoEnvio' y 'TipoVenta'.
         * @return bool True si la actualización fue exitosa, false en caso contrario.
         */
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

        /**
         * Elimina una venta de la base de datos.
         *
         * @param int $idVenta El ID de la venta a eliminar.
         * @return bool True si la eliminación fue exitosa, false en caso contrario.
         */
        public function delete($idVenta) {
            $stmt = $this->con->prepare("DELETE FROM venta WHERE IdVenta = ?");
            return $stmt->execute([$idVenta]);
        }
    }