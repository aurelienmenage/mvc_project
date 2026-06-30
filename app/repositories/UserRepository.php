<?php

require_once "Database.php";

class UserRepository {
    private PDO $pdo;

    public function __construct() 
    {
        $this->pdo = Database::getConnection();//on récupère la connexion
    } 
    public function getAllUsers(){ // on récupère tous les utilisateurs
        $stmt = $this->pdo->query("SELECT * FROM users");//ça exécute
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//on récupère toutes lignes sou forme d'un tableau associatif
    }
    public function getUserById($id){// on crée une requête sécurisée
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);// on remplace le ? par $id
        return $stmt->fetch(PDO::FETCH_ASSOC);//on récupère la ligne de l'utilisateur correspondant
    }
    public function addUser($name, $email) {// on ajoute un utilisateur
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }
    public function updateUser($id, $name, $email){// on modifie l'utilisateur
        $stmt = $this->pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }
    public function deleteUser($id) {// on supprimel'utilisateur
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);//préparation de la requête et exécution avec l'id
    }
}


