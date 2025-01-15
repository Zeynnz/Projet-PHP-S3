<?php

namespace Controleur;

use Modele\JoueurDAO;
use Modele\ParticiperDAO;

class getStatsJoueurs
{

    private $dao;
    private $id_joueur;


    public function __construct($id_joueur)
    {
        $this->dao = new ParticiperDAO();
        $this->id_joueur = $id_joueur;
    }


    public function getWinRate()
    {

        return $this->dao->getWinRate($this->id_joueur);

    }

    public function getMoyenneNote()
    {
        return $this->dao->getMoyenneNote($this->id_joueur);
    }
}