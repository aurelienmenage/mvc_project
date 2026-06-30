<?php

require_once "../app/repositories/UserRepository.php";// on inclut le fichier


class UserController {//on crée la classe qui gère les actions des utilisateurs
    private $UserRepository;

    public function __construct()// on crée un repository pour pouvoir
    {                           // appeler findAll(), create(), edit(), delete()
        $this->UserRepository = new UserRepository();
    }

    public function Index() {// on récupère tous les utilisateurs
        $users = $this->UserRepository->findAll();
        require "../app/views/user/index.php";// on charge la vue index.php
    }

    public function Create(){ //
        if ($_SERVER["REQUEST_METHOD"] === "POST") {// si le formulaire est envoyé
            $this->UserRepository->Create($_POST);// on enregistre et on redirige (post)
            header("location: /users");//sinon on affiche le formulaire de création
            exit;
        }
        require "../app/views/user/create.php";// on affiche le formulaire (get)
    }
    public function Edit($id) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {//SI on a "post", 
            $this->UserRepository->update($id, $_POST);// on met à jour l'utilisateur, et on redirige
            header("location: /users");//sinon on récupère l'utilisateur,
            exit;
        }
        $user = $this->UserRepository->Find($id);//  et on affiche le formulaire pré-rempli(get)
        require "../app/views/user/edit.php";
    }
    public function Delete($id) {
        $this->UserRepository->delete($id);//on supprime et 
        header("location: /users");// on redirige vers la liste
        exit;
    }
}






