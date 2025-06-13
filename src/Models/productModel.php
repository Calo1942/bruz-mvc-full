<?php

    namespace BruzDeporte\Models;

    use BruzDeporte\Config\Connect\DBConnect;
    use BruzDeporte\Config\Interfaces\Crud;

    /**
     * Clase ProductModel
     *
     * Esta clase maneja las operaciones CRUD para la tabla 'producto' en la base de datos.
     * Extiende de DBConnect para la conexión a la base de datos e implementa la interfaz Crud
     * para asegurar la implementación de los métodos básicos de manipulación de datos.cksss
     */
    class ProductModel extends DBConnect implements Crud {

        /**
         * Almacena un nuevo producto en la base de datos.
         *
         * @param array $data Un array asociativo que contiene los datos del producto,
         * incluyendo 'Nombre', 'IdCategoria' y opcionalmente 'Descripcion', 'Talla',
         * 'Imagen', 'Detal', 'Mayor', 'Stock'.
         * @return bool True si la inserción fue exitosa, false en caso contrario.
         */
        public function store($data) {
            $sql = "INSERT INTO producto (
                Nombre, Descripcion, Talla, Imagen, Detal, Mayor, Stock, IdCategoria
            ) VALUES (
                :Nombre, :Descripcion, :Talla, :Imagen, :Detal, :Mayor, :Stock, :IdCategoria
            )";
            $stmt = $this->con->prepare($sql);
            return $stmt->execute([
                ':Nombre' => $data['Nombre'],
                ':Descripcion' => $data['Descripcion'] ?? null,
                ':Talla' => $data['Talla'] ?? null,
                ':Imagen' => $data['Imagen'] ?? null,
                ':Detal' => $data['Detal'] ?? null,
                ':Mayor' => $data['Mayor'] ?? null,
                ':Stock' => $data['Stock'] ?? 0, // Default to 0 if not provided
                ':IdCategoria' => $data['IdCategoria']
            ]);
        }

        /**
         * Recupera todos los productos de la base de datos.
         *
         * @return array Un array de arrays asociativos, donde cada array representa una fila de producto.
         */
        public function findAll() {
            $stmt = $this->con->query("SELECT * FROM producto");
            $productos = $stmt->fetchAll();
            $uploadDir = __DIR__ . '/../storage/img/products/'; // Ruta absoluta para el servidor

            foreach ($productos as &$producto) {
                if (!empty($producto['Imagen'])) {
                    $producto['Imagen'] = APP_BASE_URL . '/src/storage/img/products/' . $producto['Imagen'];
                }
            }

            return $productos;
        }

        /**
         * Busca un producto específico por su ID.
         *
         * @param int $idProducto El ID del producto a buscar.
         * @return array|false Un array asociativo que representa el producto encontrado,
         * o false si no se encontró ningún producto con el ID dado.
         */
        public function find($idProducto) {
            $stmt = $this->con->prepare("SELECT * FROM producto WHERE IdProducto = ?");
            $stmt->execute([$idProducto]);
            $producto = $stmt->fetch();

            if ($producto && !empty($producto['Imagen'])) {
                $producto['Imagen'] = APP_BASE_URL . '/src/storage/img/products/' . $producto['Imagen'];
            }

            return $producto;
        }

        /**
         * Actualiza un producto existente en la base de datos.
         *
         * @param int $idProducto El ID del producto a actualizar.
         * @param array $data Un array asociativo que contiene los nuevos datos del producto,
         * incluyendo 'Nombre', 'IdCategoria' y opcionalmente 'Descripcion', 'Talla',
         * 'Imagen', 'Detal', 'Mayor', 'Stock'.
         * @return bool True si la actualización fue exitosa, false en caso contrario.
         */
        public function update($idProducto, $data) {
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
                ':Descripcion' => $data['Descripcion'] ?? null,
                ':Talla' => $data['Talla'] ?? null,
                ':Imagen' => $data['Imagen'] ?? null,
                ':Detal' => $data['Detal'] ?? null,
                ':Mayor' => $data['Mayor'] ?? null,
                ':Stock' => $data['Stock'] ?? 0, // Default to 0 if not provided
                ':IdCategoria' => $data['IdCategoria'],
                ':IdProducto' => $idProducto
            ];
            return $stmt->execute($params);
        }

        /**
         * Elimina un producto de la base de datos.
         *
         * @param int $idProducto El ID del producto a eliminar.
         * @return bool True si la eliminación fue exitosa, false en caso contrario.
         */
        public function delete($idProducto) {
            $stmt = $this->con->prepare("DELETE FROM producto WHERE IdProducto = ?");
            return $stmt->execute([$idProducto]);
        }
    }