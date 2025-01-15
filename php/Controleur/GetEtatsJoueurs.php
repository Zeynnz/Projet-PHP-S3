<?php

namespace Controleur;

use Modele\ParticiperDAO;


require_once __DIR__ . '/../Modele/ParticiperDAO.php';
class GetEtatsJoueurs
{

    private $dao;
    private $id_joueur;



    public function __construct($id_joueur){
        $this->id_joueur = $id_joueur;
        $this->dao = new ParticiperDAO();
    }



    public function executeTitulaire(){
        return $this->dao->getNbTitulaire($this->id_joueur);
    }

    public function executeRemplacant(){
        return $this->dao->getNbRemplacant($this->id_joueur);
        }
}

