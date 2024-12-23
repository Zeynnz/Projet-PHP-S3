<?php

namespace Modele;

class Matchs
    {
    private $Date_Heure_Match;
    private $Nom_Equipe_VS;
    private $Lieu_Rencontre;
    private $Resultat;

    public function __construct($Date_Heure_Match,$Nom_Equipe_VS,$Lieu_Rencontre,$Resultat){
        $this->Date_Heure_Match = $Date_Heure_Match;
        $this->Nom_Equipe_VS = $Nom_Equipe_VS;
        $this->Lieu_Rencontre = $Lieu_Rencontre;
        $this->Resultat = $Resultat;
    }

    public function getDateHeureMatch(){
        return $this->Date_Heure_Match;
    }

    public function setDateHeureMatch($Date_Heure_Match){
        $this->Date_Heure_Match = $Date_Heure_Match;
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

}