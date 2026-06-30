<?php

?>

<h1>Modification des données Utilisateurs</h1>
<!-- formulaire qui envoie les données à edit_user.php-->
<form action="edit_user.php?id=<?= urlencode($user["id"]) ?>" method="post">

<!-- urlencode sécurise l'id pour éviter des proplèmes de caractères spéciaux-->
    <label for="name">Nom et Prénom :</label>
    <input type="text" name="name" value="<?= htmlspecialchars($user["name"]) ?>">

    <label for="email">email :</label>
    <input type="email" name="email" value="<?= htmlspecialchars($user["email"]) ?>">

    <button type="submit">Modifier</button>


</form>