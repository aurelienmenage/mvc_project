<?php

require_once "/config/Database.php";//on inclut la base de données

class Router {

    public function run() { // on utilise la méthode run() pour lancer le router

//sert à déterminer le contrôleur et l'action à exécuter
$controller = $_GET["controler"] ?? "user";//controller = user
$action = $_GET["action"] ?? "index";// action = index

$controllerName = ucfirst($controller) . "Controller";//on construit le nom du controller
$controllerFile = "../app/controllers/" . $controllerName . ".php";//on construit le chemin du controller

if(!file_exists($controllerFile)) { // Si le ficher n'existe pas alors
    die("contrôleur introuvable");// on met le message d'erreur
}

require_once $controllerFile; //on inclut le ficher du controller

$controllerObject = new $controllerName();//le routeur crée un objet du controller

if(!method_exists($controllerObject, $action)){//on vérifie si l'action existe
    die("Action inexistante");//si l'action demandée n'existe pas on envoie un message d'erreur
}

    $controllerObject->$action();//on exécute l'action

    }
}

