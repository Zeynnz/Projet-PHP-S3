<?php

namespace Modele;

use PDO;

require_once 'DAO.php';

class JoueurDAO extends DAO
{


    public function __construct()
    {
        parent::__construct();
    }

    function Ajouter($NumLicence="", $Statut = "",$PostePrefere="",$DateNaissance="",$Poids=0,$Taille=0,$Nom="",$Prenom=""): Joueur
    {
        $add = $this->pdo->prepare('INSERT INTO joueur(numero_licence, statut, poste_prefere, date_naissance, poids, taille, nom, prenom) 
        VALUES(:numero_licence, :statut, :poste_prefere, :date_naissance, :poids, :taille, :nom, :prenom)');
        $add->execute(array(
            'numero_licence' => $NumLicence,
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

    function Supprimer($id_joueur=0)
    {
        $delete = $this->pdo->prepare('DELETE FROM joueur WHERE id_joueur = :id_joueur');
        $delete->execute(array('id_joueur' => $id_joueur));

        if ($delete->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function Modifier($id_joueur,$numero_licence,$statut,$poste_prefere,$date_naissance,$poids,$taille,$nom,$prenom)
    {
        $getJoueur = $this->pdo->prepare('SELECT * FROM joueur WHERE id_joueur = :id_joueur');
        $getJoueur->execute(array('id_joueur' => $id_joueur));


            // Requête d'insertion
            $alter = $this->pdo->prepare('UPDATE joueur SET numero_licence = :numero_licence, 
                                         statut = :statut, poste_prefere = :poste_prefere, date_naissance = :date_naissance,
                                         poids = :poids, taille = :taille, nom = :nom, prenom = :prenom WHERE id_joueur = :id_joueur');
            $alter->execute(array(
                'id_joueur' => $id_joueur,
                'numero_licence' => $numero_licence,
                'statut' => $statut,
                'poste_prefere' => $poste_prefere,
                'date_naissance' => $date_naissance,
                'poids' => $poids,
                'taille' => $taille,
                'nom' => $nom,
                'prenom' => $prenom,
            ));

            return new Joueur($numero_licence,$statut,$poste_prefere,$date_naissance,$poids,$taille,$nom,$prenom);

    }

    function getOne($id_joueur)
    {
        $query = $this->pdo->prepare('SELECT * FROM joueur');
        $query->execute(array('id_joueur' => $id_joueur));
        $joueurs = $query->fetch(PDO::FETCH_ASSOC);

        foreach ($joueurs as $joueur) {
            if ($joueur->id_joueur = $id_joueur) {
                return $joueur;
            }
        }
        return new Joueur($joueur->numero_licence, $joueur->statut, $joueur->poste_prefere, $joueur->date_naissance, $joueur->poids, $joueur->taille, $joueur->nom, $joueur->prenom);

    }

    function getAll(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM joueur');
        $query->execute(array());
        $joueurs = $query->fetchAll();

        return $joueurs;
    }

}