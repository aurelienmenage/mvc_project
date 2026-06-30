<?php
$name = $name ?? "";
$email = $email ?? "";
?>

<h1>Créer un utilisateur</h1>

<form action="create_user.php" method="post">
    
    <label for="name">Nom et Prénom :</label>
    <input type="text" name="name" value="<?= htmlspecialchars($name) ?>">

    <label for="email">Email :</label>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>">
    
    <button type="submit">Créer</button>

</form>


