<?php
namespace Controleur;

use Modele\Joueur;
use Modele\JoueurDAO;

require_once __DIR__ . '/../Modele/JoueurDAO.php';
require_once __DIR__ . '/../Modele/Joueur.php';


class AjouterJoueur
{
    private $numeroLicence;
    private $statut;
    private $postePrefere;
    private $dateNaissance;
    private $poids;
    private $taille;
    private $nom;
    private $prenom;
    private $dao;


    public function __construct($numeroLicence,$statut,$postePrefere,$dateNaissance,$poids,$taille,$nom,$prenom)
    {
        $this->numeroLicence = $numeroLicence;
        $this->statut = $statut;
        $this->postePrefere = $postePrefere;
        $this->dateNaissance = $dateNaissance;
        $this->poids = $poids;
        $this->taille = $taille;
        $this->nom = $nom;
        $this->prenom = $prenom;

        $this->dao = new JoueurDAO();
    }

    public function execute(): Joueur
    {
        return $this->dao->Ajouter($this->numeroLicence, $this->statut, $this->postePrefere, $this->dateNaissance, $this->poids, $this->taille, $this->nom, $this->prenom);

    }



}