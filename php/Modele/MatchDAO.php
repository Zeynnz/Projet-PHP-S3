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

    function Modifier($id_match,$Date_match,$Heure_match,$Nom_Equipe_VS,$Lieu_Rencontre,$Resultat,$unused=null,$unused1=null,$unused2=null)
    {
        $getmatchs = $this->pdo->prepare('SELECT * FROM matchs WHERE id_match = :id_match');
        $getmatchs->execute(array('id_match' => $id_match));


        // Requête d'insertion
        $alter = $this->pdo->prepare('UPDATE matchs SET date_match = :date_match, 
                                         heure_match = :heure_match, nom_equipe_vs= :nom_equipe_vs, lieu_rencontre = :lieu_rencontre,
                                         resultat = :resultat WHERE id_match = :id_match');
        $alter->execute(array(
            'id_match' => $id_match,
            'date_match' => $Date_match,
            'heure_match' => $Heure_match,
            'nom_equipe_vs' => $Nom_Equipe_VS,
            'lieu_rencontre' => $Lieu_Rencontre,
            'resultat' => $Resultat,
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
}