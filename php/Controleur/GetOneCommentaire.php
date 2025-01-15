<?php

namespace Controleur;

use Modele\Commentaire;
use Modele\CommentaireDAO;

class GetOneCommentaire
{

    private $id_commentaire;
    private $dao;

    public function __construct($id_commentaire)
    {
        $this->id_commentaire = $id_commentaire;
        $this->dao = new CommentaireDAO();
    }

    public function execute()
    {
        return $this->dao->getOne($this->id_commentaire);
    }

}