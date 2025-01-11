<?php

namespace Controleur;

use Modele\MatchDAO;

require_once __DIR__ . '/../Modele/MatchDAO.php';
require_once __DIR__ . '/../Modele/Matchs.php';

class SupprimerMatch
{
    private $id_match;
    private $dao;

    public function __construct($id_match)
    {
        $this->id_match = $id_match;

        $this->dao = new MatchDAO();
    }

    public function execute(): bool
    {
        return $this->dao->Supprimer($this->id_match);
    }

}