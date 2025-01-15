<?php

namespace Controleur;

use Modele\CommentaireDAO;

require_once __dir__ . '/../Modele/CommentaireDAO.php';
require_once __dir__ . '/../Modele/Commentaire.php';
class SupprimerCommentaire
{
    private $dao;
    private $id_commentaire;

    public function __construct($id_commentaire){

        $this->id_commentaire = $id_commentaire;

        $this->dao = new CommentaireDAO();
    }

    public function execute() : bool
    {
       return $this->dao->Supprimer($this->id_commentaire);
    }

}