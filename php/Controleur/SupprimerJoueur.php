<?php

namespace Controleur;

use Modele\JoueurDAO;

require_once __DIR__ . '/../Modele/Joueur.php';
require_once __DIR__ . '/../Modele/JoueurDAO.php';
class SupprimerJoueur
{
    private $id_joueur;
    private $dao;

    public function __construct($id_joueur)
    {
        $this->id_joueur = $id_joueur;
        $this->dao = new JoueurDAO();
    }


    public function executer(): bool
    {
        return $this->dao->Supprimer($this->id_joueur);
    }
}