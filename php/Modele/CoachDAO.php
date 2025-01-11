<?php

namespace Modele;

use Exception;
use PDO;

require_once 'DAO.php';

class CoachDAO extends DAO
{

    function __construct() {
        parent::__construct();
    }

    function Ajouter($identifiant,$mdp)
    {
        $query = $this->pdo->prepare('SELECT * FROM coach WHERE identifiant = :identifiant');
        $query->execute(array('identifiant' => $identifiant));
        if ($query->rowCount() == 0) {
            $add = $this->pdo->prepare('INSERT INTO coach(identifiant, mdp) VALUES(:identifiant, :mdp)');
            $add->execute(array(
                'identifiant' => $identifiant,
                'mdp' => $mdp
            ));
        }else {
            throw new Exception("Un coach avec cet identifiant existe déjà.");
        }


        if($add->rowCount() > 0){
            return true;
        }else{
            return false;
        }    }


    function getOne($id_coach){
        $query = $this->pdo->prepare('SELECT * FROM coach');
        $query->execute(array("id_coach" =>$id_coach));
        $coachs = $query->fetch(PDO::FETCH_ASSOC);

        foreach ($coachs as $coach) {
            if ($coach->id_coach = $id_coach) {
                return $coach;
            }
        }
        return new Coach($coach->id_coach,$coach->mdp);

    }

    function getAll(): array {
        $all = $this->pdo->prepare("SELECT * FROM coach ORDER BY 1");
        $all->execute();  // Exécuter la requête
        $coachs = [];
        while ($row = $all->fetch(PDO::FETCH_ASSOC)) {  // Récupérer chaque ligne de résultat
            $coachs[] = new Coach($row['identifiant'], $row['mdp']);
        }
        return $coachs;
    }
}