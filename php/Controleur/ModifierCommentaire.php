<?php

namespace Controleur;

use Modele\CommentaireDAO;

require_once __dir__ . '/../Modele/CommentaireDAO.php';
require_once __dir__ . '/../Modele/Commentaire.php';
class ModifierCommentaire
{
    private $dao;
    private $id_commentaire;
    private $commentaire;
    private $id_joueur;

    public function __construct( $id_commentaire, $commentaire, $id_joueur){
        $this->id_commentaire = $id_commentaire;
        $this->commentaire = $commentaire;
        $this->id_joueur = $id_joueur;
        $this-> dao = new CommentaireDAO();
    }

    public function execute(){
        return $this->dao->Modifier($this->id_commentaire, $this->commentaire, $this->id_joueur);
    }

}