<?php

namespace Controleur;

use Modele\CoachDAO;

require_once __DIR__ . '/../Modele/Coach.php';
require_once __DIR__ . '/../Modele/CoachDAO.php';
class GetAllCoachs
{
    private $dao;

    public function __construct()
    {
        $this->dao = new CoachDAO();
    }


    public function executer(): array
    {
        return $this->dao->getAll();
    }
}