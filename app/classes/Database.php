<?php
require_once __DIR__ . '/../config/config.php';

class Database {
    private $host;
    private $db;
    private $user;
    private $pass;
    public $conn;

    public function __construct() {
        // Load configuration
        $config = require __DIR__ . '/../config/config.php';

        $this->host = $config['DB_HOST'];
        $this->db   = $config['DB_NAME'];
        $this->user = $config['DB_USER'];
        $this->pass = $config['DB_PASS'];

        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db};charset=utf8",
                $this->user,
                $this->pass
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}