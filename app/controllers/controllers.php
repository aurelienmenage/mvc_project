<?php

require_once "../app/repositories/repository.php";


class UserController {
    private $repository;

    public function __construct()
    {
        $this->repository = new $repository();
    }

    public function index() {// on affiche la liste des utilisateurs
        $users = $this->repository->getAllUsers();
        require "../app/views/user/index.php";
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






