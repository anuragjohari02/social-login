<?php
require_once 'Database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Check if user exists by provider_id
    public function getUserByProvider($provider, $provider_id) {
        $stmt = $this->db->conn->prepare("SELECT * FROM users WHERE provider = ? AND provider_id = ?");
        $stmt->execute([$provider, $provider_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Insert new user
    public function createUser($data) {
        $stmt = $this->db->conn->prepare(
            "INSERT INTO users (provider, provider_id, name, email, avatar) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->execute([
            $data['provider'],
            $data['provider_id'],
            $data['name'],
            $data['email'],
            $data['avatar']
        ]);
        return $this->db->conn->lastInsertId();
    }

    // Update existing user (optional)
    public function updateUser($id, $data) {
        $stmt = $this->db->conn->prepare(
            "UPDATE users SET name = ?, email = ?, avatar = ? WHERE id = ?"
        );
        $stmt->execute([
            $data['name'],
            $data['email'],
            $data['avatar'],
            $id
        ]);
    }
}