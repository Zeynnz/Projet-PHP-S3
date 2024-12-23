<?php

namespace Modele;

class Commentaire
{

    private $Commentaire;
    private $ID_Joueur;

    public function __construct($Commentaire, $ID_Joueur)
    {
        $this->Commentaire = $Commentaire;
        $this->ID_Joueur = $ID_Joueur;
    }

    public function getCommentaire()
    {
        return $this->Commentaire;
    }


    public function setCommentaire($Commentaire)
    {
        $this->Commentaire = $Commentaire;
    }

    public function getID_Joueur(){
        return $this->ID_Joueur;
    }
    
    public function setIDJoueur($ID_Joueur)
    {
        $this->ID_Joueur = $ID_Joueur;
    }



}