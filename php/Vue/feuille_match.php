<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feuille de Match</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Création de Feuille de Match</h1>
    <nav>
        <a href="dashboard.php">Retour</a>
    </nav>
</header>
<main>
    <form action="ajout_feuille_match.php" method="POST">
        <h2>Sélection des joueurs actifs</h2>

        <!-- Boucle PHP pour afficher les joueurs actifs -->
        <div class="joueur">
            <label>
                <input type="checkbox" name="joueur[]" value="1">
                Joueur 1
            </label>
            <label>
                <select name="poste_1">
                    <option value="titulaire">Titulaire</option>
                    <option value="remplacant">Remplaçant</option>
                </select>
            </label>
        </div>

        <div class="joueur">
            <label>
                <input type="checkbox" name="joueur[]" value="2">
                Joueur 2
            </label>
            <label>
                <select name="poste_2">
                    <option value="titulaire">Titulaire</option>
                    <option value="remplacant">Remplaçant</option>
                </select>
            </label>
        </div>

        <div class="joueur">
            <label>
                <input type="checkbox" name="joueur[]" value="3">
                Joueur 3
            </label>
            <label>
                <select name="poste_3">
                    <option value="titulaire">Titulaire</option>
                    <option value="remplacant">Remplaçant</option>
                </select>
            </label>
        </div>

        <!-- Validation des règles -->
        <h2>Règles de validation</h2>
        <p>Assurez-vous que :</p>
        <ul>
            <li>Seuls les joueurs actifs peuvent être sélectionnés.</li>
            <li>Le nombre total de joueurs correspond au nombre attendu pour le sport.</li>
            <li>Les feuilles de match ne sont pas modifiables après le match.</li>
        </ul>

        <button type="submit">Valider</button>
    </form>
</main>
</body>
</html>
