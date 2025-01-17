<?php

use Controleur\AjouterCoach;

require_once __DIR__ . "/../Controleur/AjouterCoach.php";

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (empty($login) || empty($password)) {
        $_SESSION['error'] = "Veuillez remplir tous les champs.";
        header('Location: inscription.php');
        exit;
    }

    // Hachage du mot de passe
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $controller = new AjouterCoach($login, $hashedPassword);

    try {
        $controller->execute(); // Le contrôleur doit gérer les exceptions pour utilisateur existant
        $_SESSION['reussi'] = "L'utilisateur a été créé avec succès.";
        header('Location: index.php');
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }

}
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Gestion Sportive</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<div class="inscription-container">
<h1>Bienvenue sur la page d'inscription</h1>

<?php if (isset($_SESSION['error'])): ?>
    <script type="text/javascript">
        window.onload = function () {
            alert("Erreur : <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8'); ?>");
        };
    </script>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['reussi'])): ?>
    <script type="text/javascript">
        window.onload = function () {
            alert("<?= htmlspecialchars($_SESSION['reussi'], ENT_QUOTES, 'UTF-8'); ?>");
        };
    </script>
    <?php unset($_SESSION['reussi']); ?>
<?php endif; ?>

<form action="inscription.php" method="post">
    <label for="login">Login :</label>
    <input type="text" id="login" name="login" required>
    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Envoyer</button>

    <button onclick="window.location.href='index.php'">Annuler </button>

</form>
</div>
</body>
<style>

    body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f5f5f5; /* Couleur de fond */
        font-family: Arial, sans-serif;
    }

    /* Style pour le conteneur */
    .inscription-container {
        background-color: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 350px;
    }

    /* Titre */
    .inscription-container h1 {
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
    }

    /* Champs de formulaire */
    .inscription-container input[type="text"],
    .inscription-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 1rem;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Boutons */
    .inscription-container button {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1rem;
    }

    .inscription-container button:hover {
        background-color: #0056B3;
    }


</style>
</html>


