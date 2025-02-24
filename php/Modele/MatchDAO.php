<?php

namespace Modele;

use PDO;


require_once 'DAO.php';

class MatchDAO extends DAO
{

    public function __construct()
    {
        parent::__construct();
    }

    function Ajouter($Date_match,$Heure_match,$Nom_Equipe_VS,$Lieu_Rencontre,$Resultat,$Victoire)

    {
        $add = $this->pdo->prepare('INSERT INTO matchs(date_match, heure_match, nom_equipe_vs, lieu_rencontre, resultat, victoire) 
        VALUES(:date_match, :heure_match, :nom_equipe_vs, :lieu_rencontre, :resultat, :victoire)');
        $add->execute(array(
            'date_match' => $Date_match,
            'heure_match' => $Heure_match,
            'nom_equipe_vs' => $Nom_Equipe_VS,
            'lieu_rencontre' => $Lieu_Rencontre,
            'resultat' => $Resultat,
            'victoire' => $Victoire
        ));

        if($add->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function Supprimer($id_match)
    {
        $delete = $this->pdo->prepare('DELETE FROM matchs WHERE id_match = :id_match');
        $delete->execute(array('id_match' => $id_match));

        if ($delete->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    function Modifier($id_match,$Date_match,$Heure_match,$Nom_Equipe_VS,$Lieu_Rencontre,$Resultat,$Victoire)
    {
        // Requête d'insertion
        $alter = $this->pdo->prepare('UPDATE matchs SET date_match = :date_match, 
                                         heure_match = :heure_match, nom_equipe_vs= :nom_equipe_vs, lieu_rencontre = :lieu_rencontre,
                                         resultat = :resultat ,victoire= :victoire WHERE id_match = :id_match');
        $alter->execute(array(
            'id_match' => $id_match,
            'date_match' => $Date_match,
            'heure_match' => $Heure_match,
            'nom_equipe_vs' => $Nom_Equipe_VS,
            'lieu_rencontre' => $Lieu_Rencontre,
            'resultat' => $Resultat,
            'victoire' => $Victoire
        ));

        if($alter->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }

    public function getOne($id_match)
    {
        $query = $this->pdo->prepare('SELECT * FROM matchs WHERE id_match = :id_match');
        $query->execute(array('id_match' => $id_match));
        $match = $query->fetch(PDO::FETCH_ASSOC); // Récupère une seule ligne sous forme de tableau associatif

        // Vérifiez si le match existe
        if ($match) {
            // Créez et renvoyez une instance de la classe Matchs
            return $match;

        }

        // Retournez null si aucun match trouvé
        return null;
    }


    function getAll()
    {
        $query = $this->pdo->prepare('SELECT * FROM matchs ORDER BY 1');
        $query->execute(array());
        $matchs = $query->fetchAll();

        return $matchs;
    }

    function getWinRate()
    {
        // Récupérer le total des matchs et des victoires
        $query = $this->pdo->prepare('SELECT COUNT(*) AS total_matchs,SUM(CASE WHEN victoire = TRUE THEN 1 ELSE 0 END) AS victoires
        FROM matchs');
        $query->execute();

        // Récupérer les résultats
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Si aucun match n'est trouvé, retourner 0
        if ($result['total_matchs'] == 0) {
            return 0;
        }

        // Calcul du pourcentage de victoires
        $winRate = ($result['victoires'] / $result['total_matchs']) * 100;

        // Retourner le pourcentage de victoires arrondi à 2 décimales
        return round($winRate, 2);
    }
}