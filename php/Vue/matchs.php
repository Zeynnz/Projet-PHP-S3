<?php

session_start();
if($_SESSION['connexion']==false){
    header('Location: index.php');
    exit();
}

use Controleur\GetAllMatchs;
use Controleur\SupprimerMatch;

require_once __DIR__ . "/../Controleur/GetAllMatchs.php";
require_once __DIR__ . "/../Controleur/SupprimerMatch.php";

$controller = new GetAllMatchs();
$matchs = $controller->executer();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_match'])) {
    $id_match = intval($_POST['id_match']);

    $supprimermatch = new SupprimerMatch($id_match);
    $supprimermatch->execute();
    header("Location: matchs.php"); // Redirection pour que le cookie soit pris en compte
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Matchs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Gestion des Matchs</h1>
    <nav>
        <a href="joueurs.php">Gérer les Joueurs</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="dashboard.php">Retour</a>
    </nav>
</header>
<main>
    <button onclick="window.location.href='AjoutMatch.php   '">Ajouter un match</button>
    <?php if (!empty($matchs)): ?>
    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>Heure</th>
            <th>Adversaire</th>
            <th>Lieu</th>
            <th>Résultat</th>
            <th>Victoire</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($matchs as $match): ?>
        <tr>
            <td><?php echo htmlspecialchars($match['date_match']);?></td>
            <td><?php echo htmlspecialchars($match['heure_match']);?></td>
            <td><?php echo htmlspecialchars($match['nom_equipe_vs']);?></td>
            <td><?php echo htmlspecialchars($match['lieu_rencontre']);?></td>
            <td><?php echo htmlspecialchars($match['resultat']);?></td>
            <td><?php echo ($match['victoire']) ? 'Victoire' : 'Défaite';?></td>
            <td id="actions">
                <form method="post" action="ModifierMatch.php">
                    <input type="hidden" name="id_match" value="<?php echo htmlspecialchars($match['id_match']);?>">
                    <input type="hidden" name="date_match" value="<?php echo htmlspecialchars($match['date_match']);?>">
                    <input type="hidden" name="heure_match" value="<?php echo htmlspecialchars($match['heure_match']);?>">
                    <input type="hidden" name="nom_equipe_vs" value="<?php echo htmlspecialchars($match['nom_equipe_vs']);?>">
                    <input type="hidden" name="lieu_rencontre" value="<?php echo htmlspecialchars($match['lieu_rencontre']);?>">
                    <input type="hidden" name="resultat" value="<?php echo htmlspecialchars($match['resultat']);?>">
                    <input type="hidden" name="victoire" value="<?php echo htmlspecialchars($match['victoire']);?>">

                    <button type="submit"> Modifier</button>
                </form>
                <form method="post" action="matchs.php">
                    <input type="hidden" name="id_match" value="<?php echo htmlspecialchars($match['id_match']);?>">
                    <button id="supprimer" type="submit">Supprimer</button>
                </form>
                <form method="post" action="feuille_match.php">
                    <input type="hidden" name="id_match" value="<?php echo htmlspecialchars($match['id_match']);?>">
                    <button id="feuilleMatch" type="submit">Feuille de match</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
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
    #supprimer{
        background: #dc3545;
    }

    #actions {
        display: flex;
        justify-content: center;
    }

    #actions button{
        margin: 0 10px;
    }
</style>
</html>
