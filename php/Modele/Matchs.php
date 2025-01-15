<?php

namespace Modele;

class Matchs
    {
    private $Date_match;
    private $Heure_match;
    private $Nom_Equipe_VS;
    private $Lieu_Rencontre;
    private $Resultat;
    private $Victoire;

    public function __construct($Date_match,$Heure_match,$Nom_Equipe_VS,$Lieu_Rencontre,$Resultat,$Victoire){
        $this->Date_match = $Date_match;
        $this->Heure_match = $Heure_match;
        $this->Nom_Equipe_VS = $Nom_Equipe_VS;
        $this->Lieu_Rencontre = $Lieu_Rencontre;
        $this->Resultat = $Resultat;
        $this->Victoire = $Victoire;
    }

    public function getDateMatch(){
        return $this->Date_match;
    }

    public function setDateMatch($Date_Match){
        $this->Date_match = $Date_Match;
    }

    public function getHeureMatch(){
        return $this->Heure_match;
    }

    public function setHeureMatch($Heure_Match){
        $this->Heure_match = $Heure_Match;
    }

    public function getNomEquipeVS(){
        return $this->Nom_Equipe_VS;
    }

    public function setNomEquipeVS($Nom_Equipe_VS){
        $this->Nom_Equipe_VS = $Nom_Equipe_VS;
    }

    public function getLieuRencontre(){
        return $this->Lieu_Rencontre;
    }

    public function setLieuRencontre($Lieu_Rencontre){
        $this->Lieu_Rencontre = $Lieu_Rencontre;
    }

    public function getResultat(){
        return $this->Resultat;
    }

    public function setResultat($Resultat){
        $this->Resultat = $Resultat;
    }

    public function getVictoire(){
        return $this->Victoire;
    }

    public function setVictoire($Victoire){
        $this->Victoire = $Victoire;
    }

}