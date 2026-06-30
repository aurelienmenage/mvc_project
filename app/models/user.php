<?php

class User {
    private $Database;

    public function __construct($Database) 
    {
        $this->Database = $Database;
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $stmt = $this->Database->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserById($id){
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->Database->prepare($sql);
        $stmt->execute(["id" => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

