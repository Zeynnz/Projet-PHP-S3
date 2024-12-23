<?php

namespace Modele;

class Coach
{
    private $Identifiant;
    private $Mdp;


    public function __construct($Identifiant, $Mdp){
        $this->Identifiant = $Identifiant;
        $this->Mdp = $Mdp;
    }

    public function getIdentifiant(){
        return $this->Identifiant;
    }

    public function getMdp(){
        return $this->Mdp;
    }

    public function setIdentifiant($identifiant){
        $this->Identifiant = $identifiant;
    }

    public function setMdp($Mdp){
        $this->Mdp = $Mdp;
    }

}