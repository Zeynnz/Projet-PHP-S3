<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Feuille de Match</title>
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
    <form action="submit_feuille_match.php" method="POST">
        <h2>Sélection des joueurs</h2>
        <div>
            <!-- Boucle PHP : liste des joueurs actifs -->
            <label>
                <input type="checkbox" name="joueur[]" value="1">
                Joueur 1 (Titulaire)
            </label>
        </div>
        <button type="submit">Valider</button>
    </form>
</main>
</body>
</html>
