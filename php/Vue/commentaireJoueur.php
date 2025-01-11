<?php
session_start();

use Controleur\GetOneJoueur;

require_once __DIR__ . '/../Controleur/GetOneJoueur.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['id'] = $_POST['id_joueur'];

}

    $id_joueur = intval($_SESSION['id']);
    $controller = new GetOneJoueur($id_joueur);
    $joueur = $controller->executer();



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
        <a href="joueurs.php">Retour à la liste des joueurs</a>
    </nav>
</header>
<main>
    <h2>Joueur :  <span id="prenom-joueur"><?php echo htmlspecialchars($joueur->getPrenom()); ?></span> <span id="nom-joueur"><?php echo htmlspecialchars($joueur->getNom())?></span></h2>
    <section id="commentaires-section">
        <h3>Commentaires :</h3>
        <ul id="liste-commentaires">
            <!-- Exemple de structure d'un commentaire -->
            <li>
                <strong>Ajouté par :</strong> Coach1<br>
                <strong>Date :</strong> 2025-01-11<br>
                <strong>Commentaire :</strong> Très bon joueur, mais doit travailler sur l'endurance.
            </li>
            <li>
                <strong>Ajouté par :</strong> Coach2<br>
                <strong>Date :</strong> 2025-01-10<br>
                <strong>Commentaire :</strong> Amélioration remarquable ces derniers mois.
            </li>
            <!-- Les commentaires supplémentaires seront générés ici -->
        </ul>
    </section>
    <form method="post" action="AjoutCommentaire.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id_joueur); ?>">
        <button type="submit">Ajouter un commentaire</button>
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
