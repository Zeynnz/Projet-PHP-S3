<?php

namespace Controleur;

use Modele\ParticiperDAO;

require_once __DIR__ . '/../Modele/ParticiperDAO.php';
require_once __DIR__ . '/../Modele/Participer.php';


class AjouterFeuille
{
    private $note;
    private $etat;
    private $poste;
    private $id_Joueur;
    private $id_Match;
    private $nom;
    private $prenom;
    private $dao;

    public function __construct($note, $etat, $poste, $id_Joueur, $id_Match,$nom,$prenom){
        $this->note = $note;
        $this->etat = $etat;
        $this->poste = $poste;
        $this->id_Joueur = $id_Joueur;
        $this->id_Match = $id_Match;
        $this->nom = $nom;
        $this->prenom = $prenom;

        $this->dao = new ParticiperDAO();
    }

    public function execute(){
        return $this->dao->Ajouter($this->note, $this->etat, $this->poste, $this->id_Joueur, $this->id_Match,$this->nom,$this->prenom);
    }

}