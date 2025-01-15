<?php

session_start();
if($_SESSION['connexion']==false){
    header('Location: index.php');
    exit();
}

use Controleur\modifierJoueur;
require_once __DIR__ . '/../Controleur/ModifierJoueur.php';

$numeroLicence = $statut = $poste = $dateNaissance = $poids = $taille = $nom = $prenom = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id_joueur'])) {
        $id_joueur = intval($_POST['id_joueur']);

        // Pré-remplissage des valeurs reçues
        $numeroLicence = $_POST['numero_licence'] ?? '';
        $statut = $_POST['statut'] ?? '';
        $poste = $_POST['poste_prefere'] ?? '';
        $dateNaissance = $_POST['date_naissance'] ?? '';
        $poids = $_POST['poids'] ?? '';
        $taille = $_POST['taille'] ?? '';
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';

        // Si le formulaire est soumis pour modification
        if (isset($_POST['modifier'])) {
            $modifierJoueur = new modifierJoueur(
                $id_joueur,
                $numeroLicence,
                $statut,
                $poste,
                $dateNaissance,
                $poids,
                $taille,
                $nom,
                $prenom
            );
            $result = $modifierJoueur->execute();

            if ($result) {
                header('Location: joueurs.php');
                exit(); // Assurez-vous d'arrêter le script après la redirection
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Joueur</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<header>
    <h1>Modifier un Joueur</h1>
    <nav>
        <a href="matchs.php">Gérer les Matchs</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="joueurs.php">Retour</a>
    </nav>
</header>
<main>
    <form method="post">
        <input type="hidden" name="id_joueur" value="<?php echo htmlspecialchars($id_joueur ?? ''); ?>">
        <div>
            <label for="numero_licence">Numéro Licence :</label>
            <input type="text" id="numero_licence" name="numero_licence" value="<?php echo htmlspecialchars($numeroLicence); ?>" required>
        </div>
        <div>
            <label for="statut">Statut :</label>
            <select id="statut" name="statut" required>
                <option value="Actif" <?php echo ($statut === 'Actif') ? 'selected' : ''; ?>>Actif</option>
                <option value="Inactif" <?php echo ($statut === 'Inactif') ? 'selected' : ''; ?>>Inactif</option>
            </select>
        </div>
        <div>
            <label for="poste">Poste :</label>
            <select id="poste" name="poste" required>
                <option value="Top" <?php echo ($poste === 'Top') ? 'selected' : ''; ?>>Top</option>
                <option value="Jungle" <?php echo ($poste === 'Jungle') ? 'selected' : ''; ?>>Jungle</option>
                <option value="Mid" <?php echo ($poste === 'Mid') ? 'selected' : ''; ?>>Mid</option>
                <option value="Adc" <?php echo ($poste === 'Adc') ? 'selected' : ''; ?>>Adc</option>
                <option value="Support" <?php echo ($poste === 'Support') ? 'selected' : ''; ?>>Support</option>
            </select>
        </div>
        <div>
            <label for="date_naissance">Date de Naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance" value="<?php echo htmlspecialchars($dateNaissance); ?>" required>
        </div>
        <div>
            <label for="poids">Poids (kg) :</label>
            <input type="number" id="poids" name="poids" value="<?php echo htmlspecialchars($poids); ?>" required>
        </div>
        <div>
            <label for="taille">Taille (cm) :</label>
            <input type="number" id="taille" name="taille" value="<?php echo htmlspecialchars($taille); ?>" required>
        </div>
        <div>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required>
        </div>
        <div>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" required>
        </div>
        <div>
            <button type="submit" name="modifier">Modifier</button>
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
