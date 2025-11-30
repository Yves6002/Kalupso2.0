<?php 
// Modèle : interaction avec la BDD
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Récupérer un utilisateur par email
    public function getUserByEmail($email) {
        $result = $this->db->query(
            "SELECT * FROM users WHERE email = ?",
            [$email]
        );
        return $result ? $result[0] : null;
    }

    // Ajouter un utilisateur
    public function addUser($name, $email, $password, $role_id) {
        $this->db->query(
            "INSERT INTO users (name, email, password, role_id) VALUES (?, ?, ?, ?)",
            [
                $name,
                $email,
                password_hash($password, PASSWORD_DEFAULT),
                $role_id
            ]
        );
    }
}
