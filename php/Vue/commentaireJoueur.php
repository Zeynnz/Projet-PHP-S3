<?php
session_start();
if($_SESSION['connexion']==false){
    header('Location: index.php');
    exit();
}

use Controleur\GetAllCommentaire;
use Controleur\GetOneJoueur;
use Controleur\SupprimerCommentaire;

require_once __DIR__ . '/../Controleur/GetOneJoueur.php';
require_once __DIR__ . '/../Controleur/GetAllCommentaire.php';
require_once __DIR__ . '/../Controleur/SupprimerCommentaire.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['id'] = $_POST['id_joueur'] ?? $_SESSION['id'];
}

$id_joueur = intval($_SESSION['id']);
$controller = new GetOneJoueur($id_joueur);
$joueur = $controller->executer();

$allCommentaires = new GetAllCommentaire($id_joueur);
$commentaires = $allCommentaires->execute();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_joueur']) && isset($_POST['id_commentaire'])) {
    $id_joueur = intval($_POST['id_joueur']);
    $id_commentaire = intval($_POST['id_commentaire']);

    $supprimerCommentaire = new SupprimerCommentaire($id_commentaire);
    $supprimerCommentaire->execute();
    header("Location: commentaireJoueur.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commentaires du Joueur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Commentaires pour le Joueur</h1>
    <nav>
        <a href="matchs.php">Gérer les Matchs</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="joueurs.php">Retour à la liste des joueurs</a>
    </nav>
</header>
<main>
    <h2>Joueur :  <span id="prenom-joueur"><?php echo htmlspecialchars($joueur->getPrenom()); ?></span> <span id="nom-joueur"><?php echo htmlspecialchars($joueur->getNom())?></span></h2>
    <section id="commentaires-section">
        <h3>Commentaires :</h3>
        <ul id="liste-commentaires">
            <?php foreach ($commentaires as $commentaire): ?>
                <li>
                    <strong>Commentaire :</strong> <?php echo htmlspecialchars($commentaire['commentaire']); ?>
                    <div class="form_container">
                    <form method="post" action="modifierCommentaire.php" class="form_button">
                        <input type="hidden" name="id_commentaire" value="<?php echo htmlspecialchars($commentaire['id_commentaire']); ?>">
                        <button type="submit">Modifier</button>
                    </form>
                        <form method="POST" action="commentaireJoueur.php" class="form_button">
                            <input type="hidden" name="id_commentaire" value="<?php echo htmlspecialchars($commentaire['id_commentaire']); ?>">
                            <input type="hidden" name="id_joueur" value="<?php echo htmlspecialchars($commentaire['id_joueur']); ?>">
                            <button id="supprimer" type="submit">Supprimer</button>
                        </form>
                    </div>
            <?php endforeach; ?>
        </ul>

    </section>
        <div class="form_button">
            <button onclick="window.location.href='AjoutCommentaire.php'">Ajouter un commentaire</button>
        </div>
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

        max-width: 20em;
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

    .form_button button {

        width: 20em;
        margin: 20px 0 0 0;
    }

    .form_container {
        display: flex;
        justify-content: center;
    }

    .form_container form {
        display: flex;
        margin: 0 10px;
}

    #supprimer{
        background: #dc3545;
    }



</style>
</html>
