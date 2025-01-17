<?php
use Controleur\GetAllCoachs;

require_once __DIR__ . '/../Controleur/GetAllCoachs.php';

session_start();


if (isset($_COOKIE['user_login'])) {
    $_SESSION['connexion'] = true;
    $_SESSION['login'] = $_COOKIE['user_login'];
    header('Location: dashboard.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    $controller = new GetAllCoachs();
    $coachs = $controller->executer();

    $authenticated = false;

    foreach ($coachs as $coach) {
        if ($coach->getIdentifiant() === $login && password_verify($password, $coach->getMdp())) {
            // Authentification réussie
            $_SESSION['connexion'] = true;
            $_SESSION['login'] = $login;

            // Crée un cookie pour maintenir la connexion
            setcookie('user_login', $login, time() + (86400 * 30), "/"); // Cookie valide 30 jours

            header('Location: dashboard.php');
            exit;
        }
    }

// Si aucun coach ne correspond, redirige avec un message d'erreur
    $_SESSION['error'] = "Login ou mot de passe incorrect.";
    header('Location: index.php');
    exit;

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
<?php if (isset($_SESSION['error'])): ?>
    <script type="text/javascript">
        window.onload = function () {
            alert("Erreur : <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8'); ?>");
        };
    </script>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
<div class="login-container">
    <h1>Connexion</h1>
    <form method="POST">
        <label for="login">Nom d'utilisateur :</label>
        <input type="text" id="login" name="login" required>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>
    <button type="submit">Se connecter</button>
    </form>
    <button onclick="window.location.href='inscription.php'">S'inscrire</button>
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
    .login-container {
    background-color: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 350px;
    }

    /* Titre */
    .login-container h1 {
    font-size: 1.8rem;
    margin-bottom: 1.5rem;
    }

    /* Champs de formulaire */
    .login-container input[type="text"],
    .login-container input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    }

    /* Boutons */
    .login-container button {
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

    .login-container button:hover {
     background-color: #0056B3;
    }

</style>
</html>
