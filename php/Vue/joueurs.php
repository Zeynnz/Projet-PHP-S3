
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
        <button onclick="window.location.href='AjoutJoueur.php'">Ajouter un joueur</button>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Numéro Licence</th>
                    <th>Statut</th>
                    <th>Poste</th>
                    <th>Date De Naissance</th>
                    <th>Poids</th>
                    <th>Taille</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                </tr>
            </thead>
            <tbody>
                <!-- Boucle PHP ici -->
                <tr>
                    <td>1</td>
                    <td>00001</td>
                    <td>Actif</td>
                    <td>Jungle</td>
                    <td>31/05/2005</td>
                    <td>70</td>
                    <td>170</td>
                    <td>Coiffet</td>
                    <td>Mathéo</td>
                    <td>
                        <button>Modifier</button>
                    </td>
                    <td>
                        <button>Supprimer</button>
                    </td>
                </tr>
            </tbody>
        </table>
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
</style>
</html>
