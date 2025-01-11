<?php

namespace Modele;

use PDO;

require_once 'DAO.php';

class CommentaireDAO extends DAO
{

    function __construct() {
        parent::__construct();
    }

    function Ajouter($commentaire,$id_joueur)
    {

            $add = $this->pdo->prepare('INSERT INTO commentaire(commentaire, id_joueur) VALUES(:commentaire, :id_joueur)');
            $add->execute(array(
                'commentaire' => $commentaire,
                'id_joueur' => $id_joueur
            ));


        if($add->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    function Supprimer($id_commentaire)
    {

        $delete = $this->pdo->prepare('DELETE FROM commentaire WHERE id_commentaire = :id_commentaire');
        $delete->execute(array('id_commentaire' => $id_commentaire));


        if ($delete->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }


    function getOne($id_commentaire)
    {
        $query = $this->pdo->prepare('SELECT * FROM commentaire');
        $query->execute();
        $commentaires = $query->fetchAll();

        foreach ($commentaires as $commentaire) {
            if ($commentaire['id_commentaire'] == $id_commentaire) {
                return new Commentaire($commentaire['commentaire'], $commentaire['id_joueur']);
            }
        }

        return null;
    }


    function getCommentaireParJoueur($id_joueur): array {
        $all = $this->pdo->prepare('SELECT * FROM commentaire where id_joueur=:id_joueur ORDER BY 1');
        $all->execute(array('id_joueur' => $id_joueur));
        $commentaires = $all->fetchAll();

        return $commentaires;
    }

    function Modifier($id_commentaire, $commentaire, $id_joueur) {



        $alter = $this->pdo->prepare('UPDATE commentaire SET 
                       commentaire = :commentaire, id_joueur = :id_joueur WHERE id_commentaire = :id_commentaire');
        $alter->execute(array(
            'id_commentaire' => $id_commentaire,
            'commentaire' => $commentaire,
            'id_joueur' => $id_joueur
        ));

        if ($alter->rowCount() > 0) {
            return true;  // Modification réussie
        } else {
            return false; // Aucun changement effectué (peut aussi indiquer un problème)
        }
    }
}