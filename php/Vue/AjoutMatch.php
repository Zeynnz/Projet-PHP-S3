<?php

use Controleur\AjouterJoueur;

require_once __DIR__ . '/../Controleur/AjouterJoueur.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $date_match = $_POST['numero_licence'];
    $heure_match = $_POST['statut'];
    $nom_equipe_vs = $_POST['poste'];
    $lieu_rencontre = $_POST['date_naissance'];
    $resultat = $_POST['poids'];


    // Appeler la méthode execute
    $result = ->execute();

    if ($result) {
        header('Location: matchs.php');
        exit(); // Assurez-vous d'arrêter le script après la redirection
    }

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Joueur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Ajouter un Joueur</h1>
    <nav>
        <a href="joueurs.php">Retour</a>
    </nav>
</header>
<main>
    <form method="post">
        <div>
            <label for="nom_equipe_vs">Equipe adverse :</label>
            <input type="text" id="nom_equipe_vs" name="nom_equipe_vs" required>
        </div>
        <div>
            <label for="date_match">Date match :</label>
            <input type="date" id="date_match" name="date_match" required>
        </div>
        <div>
            <label for="heure_match">Heure match :</label>
            <input type="time" id="heure_match" name="heure_match" required>
        </div>
        <div>
            <label for="lieu_rencontre">Lieu de la rencontre :</label>
            <input type="text" id="lieu_rencontre" name="lieu_rencontre" required>
        </div>
        <div>
            <label for="resultat">Résultat :</label>
            <input type="text" id="resultat" name="resultat" required>
        </div>


        <div>
            <button type="submit">Ajouter</button>
            <button type="reset">Réinitialiser</button>
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
    form div {
        margin-bottom: 15px;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    input, select {
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
    button[type="reset"] {
        background-color: #dc3545;
    }
    button:hover {
        opacity: 0.9;
    }
</style>
</html>
