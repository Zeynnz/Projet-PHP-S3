<?php

namespace Modele;

class Joueur{
    private $numeroLicence;
    private $statut;
    private $postePrefere;
    private $dateNaissance;
    private $poids;
    private $taille;
    private $nom;
    private $prenom;


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
    }

    public function getNumeroLicence()
    {
        return $this->numeroLicence;
    }


    public function setNumeroLicence($numeroLicence)
    {
        $this->numeroLicence = $numeroLicence;
    }


    public function getStatut()
    {
        return $this->statut;
    }


    public function setStatut($statut)
    {
        $this->statut = $statut;
    }


    public function getPostePrefere()
    {
        return $this->postePrefere;
    }


    public function setPostePrefere($postePrefere)
    {
        $this->postePrefere = $postePrefere;
    }


    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }


    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;
    }


    public function getPoids()
    {
        return $this->poids;
    }


    public function setPoids($poids)
    {
        $this->poids = $poids;
    }


    public function getTaille()
    {
        return $this->taille;
    }

    public function setTaille($taille)
    {
        $this->taille = $taille;
    }


    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

}