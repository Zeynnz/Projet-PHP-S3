<?php

namespace Modele;

use PDO;

require_once 'DAO.php';

class CoachDAO extends DAO
{

    function __construct() {
        parent::__construct();
    }

    function Ajouter($identifiant,$mdp): Coach
    {
        $add = $this->pdo->prepare('INSERT INTO coach(identifiant, mdp) 
        VALUES(:identifiant, :mdp)');
        $add->execute(array(
            'identifiant' => $identifiant,
            'mdp' => $mdp
        ));

        return new coach($identifiant,$mdp);
    }

    function Supprimer(){}


    function getOne($id_coach){
        $query = $this->pdo->query('SELECT * FROM coach');
        $coachs = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($coachs as $coach) {
            if ($coach->id_coach = $id_coach) {
                return $coach;
            }
        }
        return new Coach($coach->id_coach,$coach->mdp);

    }


    function getAll(): array{
        $stmt = $this->pdo->query("SELECT * FROM coach");
        $coachs = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $coachs[] = new Coach($row['identifiant'], $row['mdp']);
        }
        return $coachs;
    }

    function Modifier($id_joueur, $numero_licence, $statut, $poste_prefere, $date_naissance, $poids, $taille, $nom, $prenom){}
}