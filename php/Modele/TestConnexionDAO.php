<?php
namespace Modele;
require_once __DIR__ . '/DAO.php'; // Inclure DAO.php


class TestConnexionDAO extends DAO
{
    public function Ajouter() {}
    public function Supprimer() {}
    public function Modifier() {}
}

// Tester la connexion
$test = new TestConnexionDAO();
echo $test->testerConnexion();
