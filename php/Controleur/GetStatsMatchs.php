<?php

namespace Controleur;

use Modele\MatchDAO;

require_once __DIR__ . "/../Modele/MatchDAO.php";

class GetStatsMatchs
{
    private $dao;

    public function __construct(){
        $this->dao= new MatchDAO();
    }

    public function getWRMatchs(){
        return $this->dao->getWinRate();
    }

}