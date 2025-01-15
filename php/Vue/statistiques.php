<?php

use Controleur\GetAllJoueurs;
use Controleur\GetStatsMatchs;
use Controleur\GetEtatsJoueurs;
use Controleur\getStatsJoueurs;

require_once __DIR__ . '/../Controleur/GetAllJoueurs.php';
require_once __DIR__ . '/../Controleur/GetEtatsJoueurs.php';
require_once __DIR__ . '/../Controleur/getStatsJoueurs.php';
require_once __DIR__ . '/../Controleur/GetStatsMatchs.php';

session_start();
if($_SESSION['connexion']==false){
    header('Location: index.php');
    exit();
}

$joueurs = (new GetAllJoueurs())->executer();

$wrMatch = (new GetStatsMatchs())->getWRMatchs();
$lrMatch = 100-$wrMatch;


foreach($joueurs as $joueur){
    $stats[] = [
        'id_joueur' => $joueur['id_joueur'],
        'nb_titu' => (new GetEtatsJoueurs($joueur['id_joueur']))->executeTitulaire() ?? 0,
        'nb_rempl' => (new GetEtatsJoueurs($joueur['id_joueur']))->executeRemplacant() ?? 0,
        'wr' => (new getStatsJoueurs($joueur['id_joueur']))->getWinRate() ?? 0,
        'moyenne' => (new getStatsJoueurs($joueur['id_joueur']))->getMoyenneNote() ?? 0,
    ];
}







?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Statistiques</h1>
    <nav>
        <a href="joueurs.php">Gérer les Joueurs</a>
        <a href="matchs.php">Gérer les Matchs</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="dashboard.php">Retour</a>
    </nav>
</header>
<main>
    <h2>Résultats des matchs</h2>
    <p>Victoire :<?php echo htmlspecialchars($wrMatch) ?> %, Défaite : <?php echo htmlspecialchars($lrMatch) ?> %</p>
    <h2>Statistiques des joueurs</h2>
    <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Statut</th>
            <th>Poste préféré</th>
            <th>Titularisations</th>
            <th>Remplacements</th>
            <th>Note moyenne</th>
            <th>% Victoires</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($joueurs as $index => $joueur):?>
        <tr>
            <td> <span><?php echo htmlspecialchars($joueur['nom'])?> </span>
                <span><?php echo htmlspecialchars($joueur['prenom'])?></span> </td>
            <td> <?php echo htmlspecialchars($joueur['statut'])?> </td>
            <td> <?php echo htmlspecialchars($joueur['poste_prefere'])?> </td>
            <td><?php echo htmlspecialchars($stats[$index]['nb_titu']) ?></td>
            <td><?php echo htmlspecialchars($stats[$index]['nb_rempl']) ?></td>
            <td><?php echo number_format($stats[$index]['moyenne'], 2) ?></td>
            <td><?php echo htmlspecialchars($stats[$index]['wr']) ?>%</td>
        <?php endforeach;?>
        </tr>
        </tbody>
    </table>
</main>
</body>
</html>
