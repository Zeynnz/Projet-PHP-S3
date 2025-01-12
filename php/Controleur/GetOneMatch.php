<?php

namespace Controleur;

use Modele\MatchDAO;

require_once __DIR__ . "/../Modele/MatchDAO.php";

class GetOneMatch
{
    private $id_match;
    private $dao;

    public function __construct($id_match){
        $this->id_match = $id_match;
        $this->dao = new MatchDAO();
    }

    public function execute(){
        return $this->dao->getOne($this->id_match);
    }

}