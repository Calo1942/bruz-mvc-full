<?php
    
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
            $this->nameDB = 'db_bruz_deporte_full';
            $this->user = 'root';
            $this->pass = '';
        }

        protected function connectDB() {
            try {
                $this->con = new PDO("mysql:host={$this->local};dbname={$this->nameDB}", $this->user, $this->pass);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());  // Manejo de errores
            }
        }
    }
