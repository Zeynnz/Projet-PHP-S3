<?php

namespace Modele;

require_once 'DAO.php';

class JoueurDAO extends DAO
{


    public function __construct()
    {
        parent::__construct();
    }

    function Ajouter($NumLicence="", $Statut = "",$PostePrefere="",$DateNaissance="",$Poids=0,$Taille=0,$Nom="",$Prenom="")
    {
        $add = $this->pdo->prepare('INSERT INTO joueur(numero_license, statut, poste_prefere, date_naissance, poids, taille, nom, prenom) 
        VALUES(:numero_license, :statut, :poste_prefere, :date_naissance, :poids, :taille, :nom, :prenom)');
        $add->execute(array(
            'numero_license' => $NumLicence,
            'statut' => $Statut,
            'poste_prefere' => $PostePrefere,
            'date_naissance' => $DateNaissance,
            'poids' => $Poids,
            'taille' => $Taille,
            'nom' => $Nom,
            'prenom' => $Prenom
        ));

        return new joueur($NumLicence,$Statut,$PostePrefere,$DateNaissance,$Poids,$Taille,$Nom,$Prenom);
    }

    function Supprimer()
    {
        // TODO: Implement Supprimer() method.
    }

    function Modifier()
    {
        // TODO: Implement Modifier() method.
    }
}