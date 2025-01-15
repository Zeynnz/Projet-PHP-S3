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
<div class="container">
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
</html>
