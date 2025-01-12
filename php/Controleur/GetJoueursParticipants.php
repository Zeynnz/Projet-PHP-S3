<?php

namespace Controleur;

use Modele\ParticiperDAO;

require_once __DIR__ . '/../Modele/ParticiperDAO.php';
require_once __DIR__ . '/../Modele/Participer.php';


class GetJoueursParticipants
{
    private $id_Match;
    private $dao;

    public function __construct($id_Match){
        $this->id_Match = $id_Match;

        $this->dao = new ParticiperDAO();
    }

    public function execute(){
        return $this->dao->getJoueursParticipants($this->id_Match);
    }

}