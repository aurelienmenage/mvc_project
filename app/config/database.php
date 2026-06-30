<?php
$host = "localhost";
$dbname = "mvc_project";
$username = "root";
$password = "";

try{//on définit la connexion et on crée l'objet de connexion
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Vous êtes connecté";
} catch(PDOException $e) { //
    echo "Vous n'êtes pas connecté : " . $e->getMessage();
}
?>