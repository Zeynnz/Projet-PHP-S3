<?php
session_start();
if($_SESSION['connexion']==false){
    header('Location: index.php');
    exit();
}
?>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Gestion Sportive</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Tableau de Bord</h1>
    <nav>
        <a href="joueurs.php">Gérer les Joueurs</a>
        <a href="matchs.php">Gérer les Matchs</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="index.php">Déconnexion</a>
    </nav>
</header>
<main>
    <p>Bienvenue dans l'application de gestion sportive <?php echo $_SESSION['login'] ?> !</p>
</main>
</body>
</html>