<?php

use Controleur\AjouterJoueur;

require_once __DIR__ . '/../Controleur/AjouterJoueur.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $numeroLicence = $_POST['numero_licence'];
    $statut = $_POST['statut'];
    $poste = $_POST['poste'];
    $dateNaissance = $_POST['date_naissance'];
    $poids = $_POST['poids'];
    $taille = $_POST['taille'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    // Créer une instance de la classe AjouterJoueur
    $ajouterJoueur = new AjouterJoueur($numeroLicence,$statut,$poste,$dateNaissance,$poids,$taille,$nom,$prenom);

    // Appeler la méthode execute
    $result = $ajouterJoueur->execute();

    if ($result) {
        header('Location: joueurs.php');
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
            <label for="numero_licence">Numéro Licence :</label>
            <input type="text" id="numero_licence" name="numero_licence" required>
        </div>
        <div>
            <label for="statut">Statut :</label>
            <select id="statut" name="statut" required>
                <option value="Actif">Actif</option>
                <option value="Inactif">Inactif</option>
            </select>
        </div>
        <div>
            <label for="poste">Poste :</label>
            <input type="text" id="poste" name="poste" required>
        </div>
        <div>
            <label for="date_naissance">Date de Naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" required>
        </div>
        <div>
            <label for="poids">Poids (kg) :</label>
            <input type="number" id="poids" name="poids" required>
        </div>
        <div>
            <label for="taille">Taille (cm) :</label>
            <input type="number" id="taille" name="taille" required>
        </div>
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
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
