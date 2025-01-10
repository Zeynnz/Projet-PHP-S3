<?php
namespace Modele;
require_once __DIR__ . '/DAO.php'; // Inclure DAO.php


class TestConnexionDAO extends DAO
{
    public function Ajouter($identifiant, $mdp) {}
    public function Supprimer() {}
    public function Modifier($id_joueur, $numero_licence, $statut, $poste_prefere, $date_naissance, $poids, $taille, $nom, $prenom) {}

    function getAll(){}

    function getOne($id_joueur){}
}

// Tester la connexion
$test = new TestConnexionDAO();
echo $test->testerConnexion();
