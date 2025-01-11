<?php

namespace Controleur;


use Modele\MatchDAO;

require_once __DIR__ . '/../Modele/Matchs.php';
require_once __DIR__ . '/../Modele/MatchDAO.php';
class GetAllMatchs
{
    private $dao;

    public function __construct()
    {
        $this->dao = new MatchDAO();
    }


    public function executer(): array
    {
        return $this->dao->getAll();
    }
}