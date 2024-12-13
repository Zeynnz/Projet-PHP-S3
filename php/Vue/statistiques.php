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
        <a href="dashboard.php">Retour</a>
    </nav>
</header>
<main>
    <h2>Résultats des matchs</h2>
    <p>Victoire : 50%, Défaite : 30%, Nul : 20%</p>
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
        <!-- Boucle PHP ici -->
        <tr>
            <td>Joueur 1</td>
            <td>Actif</td>
            <td>Attaquant</td>
            <td>5</td>
            <td>2</td>
            <td>4.5</td>
            <td>60%</td>
        </tr>
        </tbody>
    </table>
</main>
</body>
</html>
