<?php

class UserController {
    private $models;

    public function __construct($userModels)
    {
        $this->models = $userModels;
    }

    public function listUsers() {// on affiche la liste des utilisateurs
        $users = $this->models->getAllUsers();
        require "views/user_list.php";
    }

    public function detailUser(){ //on affiche le détail d'un utilisateur
        $id = $_GET["id"] ?? null;
        if($id === null) {
            echo "id manquant";
            return;
        }
        require "views/user_detail.php";
    }
}






