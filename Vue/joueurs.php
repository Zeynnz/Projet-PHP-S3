<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Joueurs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Gestion des Joueurs</h1>
        <nav>
            <a href="dashboard.php">Retour</a>
        </nav>
    </header>
    <main>
        <button>Ajouter un joueur</button>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle PHP ici -->
                <tr>
                    <td>Exemple</td>
                    <td>Exemple</td>
                    <td>Actif</td>
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