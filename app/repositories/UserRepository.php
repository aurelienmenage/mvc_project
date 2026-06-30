<?php

require_once "db.php";

class UserRepository {
    private PDO $pdo;

    public function __construct() 
    {
        $this->pdo = db::getConnection();
    }
    public function getAllUsers(){
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserById($id){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addUser($name, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        return $stmt->execute($name, $email);
    }
    public function updateUser($id, $name, $email){
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ?, WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }
    public function deleteUser($id) {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}


