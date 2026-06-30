<?php
// 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mvc_project</title>
</head>
<body>

<h1>Liste des Utilisateurs</h1>

    <a href="/views/create_user.php">Ajouter un utilisateur</a>

    <ul>
        <?php foreach ($users as $user): ?>

            <li><?= htmlspecialchars($user["id"]) ?></li>
            <li><?= htmlspecialchars($user["name"]) ?></li>
            <li><?= htmlspecialchars($user["email"]) ?></li>

            <a href="/views/edit?id=<?= $user["id"] ?>">Modifier</a>
            <a href="/views/delete?id=<?= $user["id"] ?>">Supprimer</a>

            <?php endforeach; ?>
    </ul>




</body>
</html>




