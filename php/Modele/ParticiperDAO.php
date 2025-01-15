<?php

namespace Modele;

use Modele\DAO;
use PDO;

require_once 'DAO.php';

class ParticiperDAO extends DAO
{


    public function __construct()
    {
        parent::__construct();
    }

    public function Ajouter($note_individuel, $etat, $poste, $id_joueur, $id_match, $nom, $prenom)
    {

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

        if ($add->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function Modifier($note_individuel, $etat, $poste, $id_joueur, $id_match, $nom, $prenom)
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

        if ($alter->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function getJoueursParticipants($id_match)
    {
        $query = $this->pdo->prepare('SELECT * FROM participer WHERE id_match = :id_match ');
        $query->execute(array('id_match' => $id_match));
        $participants = $query->fetchAll(PDO::FETCH_ASSOC);

        // Vérifiez si le match existe
        if ($query->rowCount() == 5 || $query->rowCount() == 6) {
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

    function getNbTitulaire($id_joueur)
    {

        $getTitualire = $this->pdo->prepare('Select count(*) as nb_titulaire from participer where id_joueur=:id_joueur AND titulaire_remplacant= :titulaire ');
        $getTitualire->execute(array('id_joueur' => $id_joueur, 'titulaire' => 'titulaire'));

        $result = $getTitualire->fetch(PDO::FETCH_ASSOC);

        return $result['nb_titulaire'] ?? 0;
    }

    function getNbRemplacant($id_joueur)
    {

        $getRemplacant = $this->pdo->prepare('Select count(*) as nb_remplacant from participer where id_joueur=:id_joueur AND titulaire_remplacant= :remplacant ');
        $getRemplacant->execute(array('id_joueur' => $id_joueur, 'remplacant' => 'remplacant'));

        $result = $getRemplacant->fetch(PDO::FETCH_ASSOC);

        return $result['nb_remplacant'] ?? 0;
    }

    function getMoyenneNote($id_joueur)
    {

        $getMoyenne = $this->pdo->prepare('Select avg(note_individuel) as note from participer where id_joueur=:id_joueur');
        $getMoyenne->execute(array('id_joueur' => $id_joueur));

        $result = $getMoyenne->fetch(PDO::FETCH_ASSOC);

        return $result['note'] ?? 0;
    }

    function getWinRate($id_joueur) {
        $getWR = $this->pdo->prepare('
        SELECT 
            j.id_joueur, 
            j.nom, 
            j.prenom,
            COUNT(CASE WHEN m.victoire = TRUE THEN 1 END) AS victoires,
            COUNT(*) AS total_matchs,
            ROUND(COUNT(CASE WHEN m.Victoire = TRUE THEN 1 END) * 100.0 / COUNT(*), 2) AS pourcentage_victoires
        FROM 
            Participer p 
        JOIN 
            Matchs m ON p.Id_Match = m.Id_Match 
        JOIN 
            Joueur j ON p.Id_Joueur = j.Id_Joueur
        WHERE 
            j.Id_Joueur = :id_joueur
        GROUP BY 
            j.Id_Joueur, j.Nom, j.Prenom;
    ');

        $getWR->execute(['id_joueur' => $id_joueur]);
        $result = $getWR->fetch(PDO::FETCH_ASSOC);

        if ($result === false) {
            return 0;
        }

        return $result['pourcentage_victoires'];
    }




}