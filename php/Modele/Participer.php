<?php

namespace Modele;

class Participer
{
    private $Note_Individuel;
    private $Titulaire_Remplacant;
    private $Poste;
    private $Id_Joueur;
    private $Id_Match;

    public function __construct($Note_Individuel,$Titulaire_Remplacant,$Poste,$Id_Joueur,$Id_Match){
        $this->Note_Individuel = $Note_Individuel;
        $this->Titulaire_Remplacant = $Titulaire_Remplacant;
        $this->Poste = $Poste;
        $this->Id_Joueur = $Id_Joueur;
        $this->Id_Match = $Id_Match;
    }

    public function getNote_Individuel(){
        return $this->Note_Individuel;
    }

    public function setNote_Individuel($Note_Individuel){
        $this->Note_Individuel = $Note_Individuel;
    }

    public function getTitulaire_Remplacant(){
        return $this->Titulaire_Remplacant;
    }

    public function setTitulaire_Remplacant($Titulaire_Remplacant){
        $this->Titulaire_Remplacant = $Titulaire_Remplacant;
    }

    public function getPoste(){
        return $this->Poste;
    }

    public function setPoste($Poste){
        $this->Poste = $Poste;
    }

    public function getId_Joueur(){
        return $this->Id_Joueur;
    }

    public function setId_Joueur($Id_Joueur){
        $this->Id_Joueur = $Id_Joueur;
    }

    public function getId_Match(){
        return $this->Id_Match;
    }

    public function setId_Match($Id_Match){
        $this->Id_Match = $Id_Match;
    }


}