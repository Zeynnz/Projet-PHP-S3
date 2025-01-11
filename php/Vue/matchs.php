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
        <a href="dashboard.php">Retour</a>
    </nav>
</header>
<main>
    <button onclick="window.location.href='AjoutMatch.php   '">Ajouter un match</button>
    <table>
        <thead>
        <tr>
            <th>Date</th>
            <th>Heure</th>
            <th>Adversaire</th>
            <th>Lieu</th>
            <th>Résultat</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <!-- Boucle PHP ici -->
        <tr>
            <td>01/01/2024</td>
            <td>14:00</td>
            <td>Équipe X</td>
            <td>Domicile</td>
            <td>Non défini</td>
            <td>
                <button>Modifier</button>
                <button>Supprimer</button>
            </td>
        </tr>
        </tbody>
    </table>
</main>
</body>
</html>
