<?php

namespace Modele;

use Modele\DAO;
use PDO;

require_once 'DAO.php';

class ParticiperDAO extends DAO
{


    public function __construct(){
        parent::__construct();
    }

    public function Ajouter($note_individuel,$etat,$poste,$id_joueur,$id_match,$nom,$prenom){

        // Requête d'ajout
        $add = $this->pdo->prepare('INSERT INTO participer(id_joueur, id_match, note_individuel, titulaire_remplacant,poste,nom,prenom) 
        VALUES(:id_joueur, :id_match, :note_individuel, :etat, :poste, :nom, :prenom)');
        $add->execute(array(
            'id_joueur' => $id_joueur,
            'id_match' => $id_match,
            'note_individuel' => $note_individuel,
            'etat' => $etat,
            'poste' => $poste,
            'nom' => $nom,
            'prenom' => $prenom
        ));

        if($add->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function Modifier($note_individuel,$etat,$poste,$id_joueur,$id_match,$nom,$prenom)
    {
        // Requête d'insertion
        $alter = $this->pdo->prepare('UPDATE participer SET id_match = :id_match, 
                                         id_joueur = :id_joueur, note_individuel = :note, titulaire_remplacant = :etat,
                                         poste = :poste, nom = :nom, prenom = :prenom WHERE id_joueur = :id_joueur AND id_match = :id_match');
        $alter->execute(array(
            'id_joueur' => $id_joueur,
            'id_match' => $id_match,
            'note' => $note_individuel,
            'etat' => $etat,
            'poste' => $poste,
            'nom' => $nom,
            'prenom' => $prenom,
        ));

        if($alter->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }

    public function getJoueursParticipants($id_match)
    {
        $query = $this->pdo->prepare('SELECT * FROM participer WHERE id_match = :id_match ');
        $query->execute(array('id_match' => $id_match));
        $participants = $query->fetchAll(PDO::FETCH_ASSOC);

        // Vérifiez si le match existe
        if ($query->rowCount()==5 || $query->rowCount()==6) {
            return $participants;
        }

        // Retournez null si aucun match trouvé
        return null;
    }

    function Supprimer($id_match)
    {
        $delete = $this->pdo->prepare('DELETE FROM participer WHERE id_match = :id_match');
        $delete->execute(array('id_match' => $id_match));

        if ($delete->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }


}