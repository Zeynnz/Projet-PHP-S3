<?php

namespace Controleur;

use Modele\JoueurDAO;

require_once __DIR__ . '/../Modele/Joueur.php';
require_once __DIR__ . '/../Modele/JoueurDAO.php';
class GetAllJoueurs
{
    private $dao;

    public function __construct()
    {
        $this->dao = new JoueurDAO();
    }


    public function executer(): array
    {
        return $this->dao->getAll();
    }
}