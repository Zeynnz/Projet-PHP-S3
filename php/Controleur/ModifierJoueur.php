<?php

namespace Controleur;

use Modele\JoueurDAO;

require_once __DIR__ . '/../Modele/Joueur.php';
require_once __DIR__ . '/../Modele/JoueurDAO.php';
class ModifierJoueur
{
    private $idJoueur;
    private $numeroLicence;
    private $statut;
    private $postePrefere;
    private $dateNaissance;
    private $poids;
    private $taille;
    private $nom;
    private $prenom;
    private $dao;

    public function __construct($id_joueur,$numero_licence,$statut,$poste_prefere,$date_naissance,$poids,$taille,$nom,$prenom)
    {
        $this->idJoueur = $id_joueur;
        $this->numeroLicence = $numero_licence;
        $this->statut = $statut;
        $this->postePrefere = $poste_prefere;
        $this->dateNaissance = $date_naissance;
        $this->poids = $poids;
        $this->taille = $taille;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dao = new JoueurDAO();
    }


    public function execute()
    {
        return $this->dao->Modifier($this->idJoueur,$this->numeroLicence,$this->statut,
            $this->postePrefere,$this->dateNaissance,$this->poids,$this->taille,$this->nom,$this->prenom);
    }
}