<?php

require_once "../app/repositories/repository.php";// on inclut le fichier


class UserController {//on crée la classe qui gère les actions des utilisateurs
    private $repository;

    public function __construct()// on crée un repository pour pouvoir
    {                           // appeler findAll(), create(), edit(), delete()
        $this->repository = new Repository();
    }

    public function index() {// on récupère tous les utilisateurs
        $users = $this->repository->findAll();
        require "../app/views/user/index.php";// on charge la vue index.php
    }

    public function create(){ //
        if ($_SERVER["REQUEST_METHOD"] === "POST") {// si le formulaire est envoyé
            $this->repository->create($_POST);// on enregistre et on redirige (post)
            header("location: /users");//sinon on affiche le formulaire de création
            exit;
        }
        require "../app/views/user/create.php";// on affiche le formulaire (get)
    }
    public function edit($id) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {//SI on a "post", 
            $this->repository->update($id, $_POST);// on met à jour l'utilisateur, et on redirige
            header("location: /users");//sinon on récupère l'utilisateur,
            exit;
        }
        $user = $this->repository->find($id);//  et on affiche le formulaire pré-rempli(get)
        require "../app/views/user/edit.php";
    }
    public function delete($id) {
        $this->repository->delete($id);//on supprime et 
        header("location: /users");// on redirige vers la liste
        exit;
    }
}






