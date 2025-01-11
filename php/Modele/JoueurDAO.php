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

    function Supprimer($id_joueur)
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
        $query = $this->pdo->prepare('SELECT * FROM joueur WHERE id_joueur = :id_joueur');
        $query->execute(array('id_joueur' => $id_joueur));
        $joueur = $query->fetch();

        if ($joueur) {
            // Si un joueur est trouvé, renvoyez un objet Joueur
            return new Joueur(
                $joueur['numero_licence'],
                $joueur['statut'],
                $joueur['poste_prefere'],
                $joueur['date_naissance'],
                $joueur['poids'],
                $joueur['taille'],
                $joueur['nom'],
                $joueur['prenom']
            );
        }

        // Retournez null si aucun joueur n'est trouvé
        return null;
    }


    function getAll(): array
    {
        $query = $this->pdo->prepare('SELECT * FROM joueur ORDER BY 1');
        $query->execute(array());
        $joueurs = $query->fetchAll();

        return $joueurs;
    }

}