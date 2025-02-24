<?php

use Controleur\AjouterCommentaire;
use Controleur\GetOneJoueur;

require_once __DIR__ . "/../Controleur/GetOneJoueur.php";
require_once __DIR__ . "/../Controleur/AjouterCommentaire.php";


session_start();

if($_SESSION['connexion']==false){
    header('Location: index.php');
    exit();
}



$id_joueur = $_SESSION['id'];
$controller = new GetOneJoueur($id_joueur);
$joueur = $controller->executer();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $commentaire = $_POST['contenu'];

    $ajouterCommentaire = new AjouterCommentaire($commentaire,$id_joueur);

    $result = $ajouterCommentaire->execute();

    if ($result) {
        header('Location: commentaireJoueur.php');
        exit(); // Assurez-vous d'arrêter le script après la redirection
    }
}




?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Commentaire</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Ajout d'un Commentaire</h1>
    <nav>
        <a href="joueurs.php">Gérer les Joueurs</a>
        <a href="matchs.php">Gérer les Matchs</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="commentaireJoueur.php">Retour à la liste des commentaires</a>
    </nav>
</header>
<main>
    <h2>Joueur :  <span id="prenom-joueur"><?php echo htmlspecialchars($joueur->getPrenom()); ?></span> <span id="nom-joueur"><?php echo htmlspecialchars($joueur->getNom())?></span></h2>

    <h3>Ajouter un commentaire :</h3>
    <form  method="post" action="AjoutCommentaire.php">
        <div>
            <label for="commentaire">Commentaire :</label>
            <textarea id="commentaire" name="contenu" rows="4" required></textarea>
            <button type="submit">Ajouter le commentaire</button>
        </div>
    </form>
</main>
</body>
<style>
    main {
        margin: 20px auto;
        max-width: 60em;
        padding: 1em;
        background: white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    ul li {
        background: #f8f8f8;
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
    }

    form div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input, textarea, button {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }

    button {
        margin-top: 10px;
        padding: 10px 15px;
        background-color: #007BFF;
        color: white;
        border: none;
        cursor: pointer;
    }

    button:hover {
        opacity: 0.9;
    }
</style>
</html>
