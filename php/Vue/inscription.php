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
    } catch (Exception $e) {
        $_SESSION['error'] = $e->getMessage();
    }

    header('Location: inscription.php');
    exit;
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
<div class="container">
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
</html>


