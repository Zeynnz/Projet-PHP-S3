<?php
session_start();
if($_SESSION['connexion']==false){
    header('Location: index.php');
    exit();
}

use Controleur\AjouterFeuille;
use Controleur\GetAllJoueursActifs;
use Controleur\GetOneMatch;
use Controleur\GetJoueursParticipants;
use Controleur\SupprimerFeuille;

require_once __DIR__ . '/../Controleur/GetJoueursParticipants.php';
require_once __DIR__ . "/../Controleur/GetOneMatch.php";
require_once __DIR__ . "/../Controleur/GetAllJoueursActifs.php";
require_once __DIR__ . "/../Controleur/AjouterFeuille.php";
require_once __DIR__ . "/../Controleur/SupprimerFeuille.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_match'])) {
    $id_match = intval($_POST['id_match']);

    // Récupération du match
    $match = (new GetOneMatch($id_match))->execute();

    // Récupération des joueurs actifs
    $joueursActifs = (new GetAllJoueursActifs())->executer();

    $joueursAttribues =(new GetJoueursParticipants($id_match))->execute();

    if (isset($_POST['joueur'])) {
        $joueursSelectionnes = $_POST['joueur']; // Le tableau des joueurs sélectionnés
        $postes = $_POST['poste']; // Les postes des joueurs (maintenant sous forme de tableau)
        $etats = $_POST['etat']; // Les états des joueurs (titulaire/remplaçant)
        $notes = $_POST['note']; // Les notes des joueurs (entre 0 et 20)
        $noms = $_POST['nom']; // Noms des joueurs
        $prenoms = $_POST['prenom']; // Prénoms des joueurs

        // Si le nombre de joueurs sélectionnés est 5 ou 6
        if (count($joueursSelectionnes) == 5 || count($joueursSelectionnes) == 6) {

            // Vérification qu'il y a au moins un joueur de chaque poste
            $postesSelectionnes = array_fill_keys(['Top', 'Jungle', 'Mid', 'Adc', 'Support'], false);
            foreach ($postes as $poste) {
                if (isset($postesSelectionnes[$poste])) {
                    $postesSelectionnes[$poste] = true;
                }
            }

            // Si tous les postes sont présents
            if (in_array(false, $postesSelectionnes)) {
                $error_message = "Veuillez sélectionner au moins un joueur pour chaque poste.";
            } else {
                // Si 6 joueurs sont sélectionnés, vérifier que 5 sont titulaires et 1 est remplaçant
                if (count($joueursSelectionnes) == 6) {
                    $titulaireCount = 0;
                    $remplacantCount = 0;

                    // Parcours des états des joueurs pour compter les titulaires et remplaçants
                    foreach ($etats as $etat) {
                        if ($etat == "titulaire") {
                            $titulaireCount++;
                        } elseif ($etat == "remplacant") {
                            $remplacantCount++;
                        }
                    }

                    // Vérifier si 5 sont titulaires et 1 est remplaçant
                    if ($titulaireCount == 5 && $remplacantCount == 1) {


                        // Valider et procéder au traitement
                        if (isset($_POST['valider']) && isset($_POST['note'])) {

                            $supprimerFeuilles = (new SupprimerFeuille($id_match))->execute();

                            foreach ($joueursSelectionnes as $index => $id_joueur) {
                                // Récupérer les informations du joueur
                                $poste = $postes[$id_joueur]; // Poste du joueur sélectionné
                                $etat = $etats[$id_joueur]; // Etat (titulaire ou remplaçant)
                                $note = $notes[$id_joueur]; // Note du joueur sélectionné
                                $nom = $noms[$id_joueur]; // Nom du joueur sélectionné
                                $prenom = $prenoms[$id_joueur]; // Prénom du joueur sélectionné
                                if (!empty($joueursAttribues)){

                                    $ajouterParticipant = (new AjouterFeuille($note,$etat,$poste,$id_joueur,$id_match,$nom,$prenom))->execute();

                                }else {
                                    $ajouterParticipant = (new AjouterFeuille($note,$etat,$poste,$id_joueur,$id_match,$nom,$prenom))->execute();

                                }
                            }
                            header('Location: matchs.php');
                            exit();
                        }
                    } else {
                        $error_message = "Si vous sélectionnez 6 joueurs, 5 doivent être titulaires et 1 doit être remplaçant.";
                    }
                } else {
                    // Si 5 joueurs sont sélectionnés, on procède directement
                    if (isset($_POST['valider']) && isset($postes) && isset($_POST['note'])) {

                        $supprimerFeuilles = (new SupprimerFeuille($id_match))->execute();

                        foreach ($joueursSelectionnes as $index => $id_joueur) {
                            // Récupérer les informations du joueur
                            $poste = $postes[$id_joueur]; // Poste du joueur sélectionné
                            $etat = $etats[$id_joueur]; // Etat (titulaire ou remplaçant)
                            $note = $notes[$id_joueur]; // Note du joueur sélectionné
                            $nom = $noms[$id_joueur]; // Nom du joueur sélectionné
                            $prenom = $prenoms[$id_joueur]; // Prénom du joueur sélectionné

                            if (!empty($joueursAttribues)) {
                                $ajouterParticipant = (new AjouterFeuille($note, $etat, $poste, $id_joueur, $id_match, $nom, $prenom))->execute();

                            } else {
                                $ajouterParticipant = (new AjouterFeuille($note, $etat, $poste, $id_joueur, $id_match, $nom, $prenom))->execute();

                            }
                        }
                        header('Location: matchs.php');
                        exit();
                    }
                }
            }

        } else {
            // Si le nombre de joueurs sélectionnés n'est pas 5 ou 6
            $error_message = "Veuillez sélectionner 5 ou 6 joueurs.";
        }
    }
}
?>

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
    <?php if (isset($match) && $match !== null): ?>
        <h1>Feuille du Match du <?php echo htmlspecialchars($match['date_match']); ?>
            contre <?php echo htmlspecialchars($match['nom_equipe_vs']); ?>
        </h1>
    <?php else: ?>
        <p>Le match n'a pas été trouvé.</p>
    <?php endif; ?>
    <nav>
        <a href="joueurs.php">Gérer les Joueurs</a>
        <a href="statistiques.php">Statistiques</a>
        <a href="matchs.php">Retour</a>
    </nav>
</header>
<main>



    <?php if (!empty($joueursAttribues)): ?>
        <h2> Joueurs selectionnés pour ce match</h2>
        <table>
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Poste</th>
                <th>Note</th>
                <th>Etat</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($joueursAttribues as $joueursAttribue): ?>
                <tr>
                    <td><?php echo htmlspecialchars($joueursAttribue['nom']);?></td>
                    <td><?php echo htmlspecialchars($joueursAttribue['prenom']);?></td>
                    <td><?php echo htmlspecialchars($joueursAttribue['poste']);?></td>
                    <td><?php echo htmlspecialchars($joueursAttribue['note_individuel']);?></td>
                    <td><?php echo htmlspecialchars($joueursAttribue['titulaire_remplacant']);?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <form action="feuille_match.php" method="POST">
        <input type="hidden" name="id_match" value="<?php echo htmlspecialchars($id_match)?>">
        <h2>Sélection parmis les joueurs actifs</h2>

        <?php if (isset($error_message)): ?>
            <div style="color: red; margin-bottom: 20px;"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>

        <?php foreach ($joueursActifs as $joueurActif): ?>
            <div class="joueur">
                <div class="joueur-info">
                    <label>
                        <input type="checkbox" name="joueur[]" value="<?php echo htmlspecialchars($joueurActif['id_joueur']); ?>">
                        <?php echo htmlspecialchars($joueurActif['nom']) ?> <?php echo htmlspecialchars($joueurActif['prenom']) ?>
                        <strong> <?php echo htmlspecialchars($joueurActif['poste_prefere']) ?></strong>
                    </label>
                </div>
                <div class="poste-selection">
                    <input name="note[<?php echo htmlspecialchars($joueurActif['id_joueur']); ?>]" type="number" max="20" min="0" value="0">
                    <input type="hidden" name="nom[<?php echo htmlspecialchars($joueurActif['id_joueur']); ?>]" value="<?php echo htmlspecialchars($joueurActif['nom']); ?>">
                    <input type="hidden" name="prenom[<?php echo htmlspecialchars($joueurActif['id_joueur']); ?>]" value="<?php echo htmlspecialchars($joueurActif['prenom']); ?>">

                    <label>
                        <select name="poste[<?php echo htmlspecialchars($joueurActif['id_joueur']); ?>]" required>
                            <option value="Top">Top</option>
                            <option value="Jungle">Jungle</option>
                            <option value="Mid">Mid</option>
                            <option value="Adc">Adc</option>
                            <option value="Support">Support</option>
                        </select>
                    </label>

                    <label>
                        <select name="etat[<?php echo htmlspecialchars($joueurActif['id_joueur']); ?>]">
                            <option value="titulaire">Titulaire</option>
                            <option value="remplacant">Remplaçant</option>
                        </select>
                    </label>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Validation des règles -->
        <h2>Règles de validation</h2>
        <p>Assurez-vous que :</p>
        <ul>
            <li>5 ou 6 joueurs doivent être selectionnés, 5 titulaires et 1 remplaçant si 6 joueurs</li>
            <li>Tous les postes doivent être selectionnés au moins  1 fois</li>
            <li>Le rôle préféré de chaque joueur est celui en bleu</li>
        </ul>
        <button type="submit" name="valider">Valider</button>
    </form>
</main>
</body>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f7fa;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #007BFF;
        color: white;
        padding: 20px;
        text-align: center;
    }

    header nav a {
        color: white;
        text-decoration: none;
        margin: 10px;
    }

    header nav a:hover {
        text-decoration: underline;
    }

    main {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .joueur {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e2e2e2;
        padding: 10px 0;
    }

    .joueur-info {
        display: flex;
        align-items: center;
    }

    .joueur-info label {
        font-size: 1.1em;
        display: flex;
        align-items: center;
    }

    .joueur input[type="checkbox"] {
        margin-right: 15px;
    }

    .joueur strong {
        color: #007BFF;
        margin-left: 10px;
    }

    .poste-selection {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .poste-selection select {
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #f9f9f9;
        width: 120px;
    }

    .poste-selection select:focus {
        border-color: #007BFF;
        background-color: #e8f0fe;
    }

    button {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 12px 20px;
        font-size: 1.1em;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 20px;
        width: 100%;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>
</html>
