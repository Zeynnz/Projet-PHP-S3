<?php
session_start();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if (isset($_SESSION['utilisateurs'][$login])) {
        $_SESSION['error'] = "Cet utilisateur existe déjà";
    } else {
        $_SESSION['utilisateurs'][$login] = $password;
        $_SESSION['reussi'] = "L'utilisateur a été créé avec succès";
    }
}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Gestion Sportive</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Connexion</h1>
    <form action="dashboard.php" method="POST">
        <label for="login">Nom d'utilisateur :</label>
        <input type="text" id="login" name="login" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Se connecter</button>
    </form>
</div>
</body>
</html>