<?php

namespace Controleur;

use Modele\CommentaireDAO;

require_once __dir__ . '/../Modele/CommentaireDAO.php';
require_once __dir__ . '/../Modele/Commentaire.php';


class AjouterCommentaire
{

    private $dao;
    private $commentaire;
    private $id_joueur;

    public function __construct($commentaire, $id_joueur){

        $this->commentaire = $commentaire;
        $this->id_joueur = $id_joueur;

        $this->dao = new CommentaireDAO();
    }

    public function execute(){
        return $this->dao->Ajouter($this->commentaire, $this->id_joueur);
    }

}