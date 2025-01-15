<?php

namespace Controleur;

use Modele\MatchDAO;
use Modele\Matchs;

require_once __DIR__ . '/../Modele/MatchDAO.php';
require_once __DIR__ . '/../Modele/Matchs.php';

class AjouterMatch
{
    private $Date_match;
    private $Heure_match;
    private $Nom_Equipe_VS;
    private $Lieu_Rencontre;
    private $Resultat;
    private $Victoire;
    private $dao;

    public function __construct($Date_match, $Heure_match, $Nom_Equipe_VS, $Lieu_Rencontre, $Resultat,$Victoire)
    {
        $this->Date_match = $Date_match;
        $this->Heure_match = $Heure_match;
        $this->Nom_Equipe_VS = $Nom_Equipe_VS;
        $this->Lieu_Rencontre = $Lieu_Rencontre;
        $this->Resultat = $Resultat;
        $this->Victoire = $Victoire;

        $this->dao = new MatchDAO();
    }

    public function execute()
    {
    return $this->dao->Ajouter($this->Date_match,$this->Heure_match,$this->Nom_Equipe_VS,$this->Lieu_Rencontre,$this->Resultat,$this->Victoire);
    }
}