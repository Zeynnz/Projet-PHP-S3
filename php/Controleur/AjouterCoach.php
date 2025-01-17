<?php
namespace Controleur;

use Modele\Coach;
use Modele\CoachDAO;

require_once __DIR__ . '/../Modele/CoachDAO.php';
require_once __DIR__ . '/../Modele/Coach.php';


class AjouterCoach
{
   private $identifiant;
   private $motDePasse;
    private $dao;


    public function __construct($identifiant, $motDePasse)
    {
        $this->identifiant = $identifiant;
        $this->motDePasse = $motDePasse;

        $this->dao = new CoachDAO();
    }

    public function execute()
    {
        return $this->dao->Ajouter($this->identifiant, $this->motDePasse);
    }



}