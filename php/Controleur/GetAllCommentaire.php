<?php

namespace Controleur;

use Modele\CommentaireDAO;

require_once __dir__ . '/../Modele/CommentaireDAO.php';
require_once __dir__ . '/../Modele/Commentaire.php';
class GetAllCommentaire
{

    private $dao;
    private $id_joueur;

    public function __construct($id_joueur){

        $this->id_joueur=$id_joueur;
        $this->dao = new CommentaireDAO();
    }

    public function execute(): array {
        return $this->dao->getCommentaireParJoueur($this->id_joueur);
    }

}