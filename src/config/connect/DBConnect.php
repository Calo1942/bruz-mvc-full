<?php
/*

    namespace BruzDeporte\Config\Connect;
    use PDO;
    use PDOException;

    abstract class DBConnect extends PDO {
        protected $con;
        private $local;
        private $nameDB;
        private $user;
        private $pass;

        public function __construct()
        {
            $this->local = 'localhost';
            $this->nameDB = 'db_bruz_deporte';
            $this->user = 'root';
            $this->pass = '';
            $this->connectDB();
        }

        protected function connectDB() {
            try {
                $this->con = new PDO("mysql:host={$this->local};dbname={$this->nameDB}", $this->user, $this->pass);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());  // Manejo de errores
            }
        }
    }
*/

namespace BruzDeporte\Config\Connect;

use PDO;
use PDOException;

abstract class DBConnect
{
    protected $con;

    public function __construct()
    {
        // Configuración centralizada (fácil de editar)
        $config = [
            'driver'   => 'mysql',
            'host'     => 'localhost',
            'port'     => '3306',
            'database' => 'db_bruz_deporte',
            'username' => 'root',
            'password' => '', // Cambia si tienes contraseña
            'charset'  => 'utf8mb4',
            'options'  => [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ],
        ];

        try {
            $this->con = new PDO(
                "{$config['driver']}:host={$config['host']};port={$config['port']};dbname={$config['database']};charset={$config['charset']}",
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            throw new PDOException("Error al conectar con la base de datos.", (int)$e->getCode());
        }
    }
}