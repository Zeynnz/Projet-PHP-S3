<?php

namespace Controleur;

use Modele\Joueur;
use Modele\JoueurDAO;

require_once __DIR__ . '/../Modele/Joueur.php';
require_once __DIR__ . '/../Modele/JoueurDAO.php';
class GetOneJoueur
{
    private $id_joueur;
    private $dao;

    public function __construct($id_joueur)
    {
        $this->id_joueur = $id_joueur;
        $this->dao = new JoueurDAO();
    }


    public function executer(): Joueur
    {
        return $this->dao->getOne($this->id_joueur);
    }
}