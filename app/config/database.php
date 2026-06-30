<?php



class Database {
    private static ?PDO $instance = null;//on créé une connexion statique privée
    //ça renvoie soit un objet pdo soit null*
    public function getConnexion():PDO {//on créé une connexion unique

        if(self::$instance === null){
            //echo "création de la connexion...\n";// garder juste pour le test
            self::$instance = new PDO ("mysql:host=localhost;dbname=boutique;charset=utf8mb4",
            "root", "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }
        return self::$instance;
    }
}


//* au départ de la connexion => null(pas encore de connexion)
//après une première connexion => un vrai objet PDO
//et le ? est OBLIGATOIRE car il initialise à null
//sans ? php rejète






/*
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
}*/
?>