<?php

namespace Vue;

use Controleur\GetAllJoueurs;
use Controleur\GetOneJoueur;
use Controleur\SupprimerJoueur;

require_once __DIR__ . '/../Controleur/SupprimerJoueur.php';

require_once __DIR__ . '/../Controleur/GetAllJoueurs.php';


$controller = new GetAllJoueurs();
$joueurs = $controller->executer();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_joueur'])) {
    $id_joueur = intval($_POST['id_joueur']);

    // Instanciez la classe SupprimerJoueur
    $supprimerJoueur = new SupprimerJoueur($id_joueur);
    $supprimerJoueur->executer();
    header("Location: joueurs.php"); // Redirection pour que le cookie soit pris en compte
    exit();
}

?>

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

        <?php if (!empty($joueurs)): ?>
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
                <?php foreach ($joueurs as $joueur): ?>
                <tr>
                    <td><?php echo htmlspecialchars($joueur['id_joueur']);?></td>
                    <td><?php echo htmlspecialchars($joueur['numero_licence']);?></td>
                    <td><?php echo htmlspecialchars($joueur['statut']);?></td>
                    <td><?php echo htmlspecialchars($joueur['poste_prefere']);?></td>
                    <td><?php echo htmlspecialchars($joueur['date_naissance']);?></td>
                    <td><?php echo htmlspecialchars($joueur['poids']);?></td>
                    <td><?php echo htmlspecialchars($joueur['taille']);?></td>
                    <td><?php echo htmlspecialchars($joueur['nom']);?></td>
                    <td><?php echo htmlspecialchars($joueur['prenom']);?></td>
                    <td>
                        <form method="post" action="ModifierJoueur.php">
                            <input type="hidden" name="id_joueur" value="<?php echo htmlspecialchars($joueur['id_joueur']); ?>">
                            <input type="hidden" name="numero_licence" value="<?php echo htmlspecialchars($joueur['numero_licence']); ?>">
                            <input type="hidden" name="statut" value="<?php echo htmlspecialchars($joueur['statut']); ?>">
                            <input type="hidden" name="poste_prefere" value="<?php echo htmlspecialchars($joueur['poste_prefere']); ?>">
                            <input type="hidden" name="date_naissance" value="<?php echo htmlspecialchars($joueur['date_naissance']); ?>">
                            <input type="hidden" name="poids" value="<?php echo htmlspecialchars($joueur['poids']); ?>">
                            <input type="hidden" name="taille" value="<?php echo htmlspecialchars($joueur['taille']); ?>">
                            <input type="hidden" name="nom" value="<?php echo htmlspecialchars($joueur['nom']); ?>">
                            <input type="hidden" name="prenom" value="<?php echo htmlspecialchars($joueur['prenom']); ?>">

                            <button type="submit">Modifier</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="joueurs.php" >
                            <input type="hidden" name="id_joueur" value="<?php echo htmlspecialchars($joueur['id_joueur']); ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="commentaireJoueur.php" >
                            <input type="hidden" name="id_joueur" value="<?php echo htmlspecialchars($joueur['id_joueur']); ?>">
                            <button type="submit">Commentaires</button>
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
</style>
</html>
