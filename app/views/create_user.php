<?php
$name = $name ?? "";// si $name existe et n'est pas null, il garde sa valeur. sinon on met une chaine vide
$email = $email ?? "";//idem que pour $name
?>

<!-- formulaire simple qui envoi les données à create_user-->
<h1>Créer un utilisateur</h1>

<form action="create_user.php" method="post">
    
    <label for="name">Nom et Prénom :</label>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">

    <label for="email">Email :</label>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>">
    
    <button type="submit">Créer</button>

</form>


