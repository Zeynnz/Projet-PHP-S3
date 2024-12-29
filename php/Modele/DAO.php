<?php
namespace Modele;

use PDO;
use PDOException;

abstract class DAO
{
    protected $pdo;

    public function __construct()
    {
        // Database configuration
        $host = 'postgres'; // Hostname or IP
        $port = 5432;       // Default PostgreSQL port
        $dbname = 'database'; // Your database name
        $user = 'root';      // Database username
        $password = 'secret'; // Database password

        try {
            // Create a new PDO instance
            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
            $this->pdo = new PDO($dsn, $user, $password);

            // Set error mode to exception
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            // Handle connection errors
            echo "Database connection failed: " . $e->getMessage();
        }
    }

    // Abstract methods for the child classes to implement
    abstract function Ajouter($identifiant,$mdp);
    abstract function Supprimer();
    abstract function Modifier($id_joueur,$numero_licence,$statut,$poste_prefere,$date_naissance,$poids,$taille,$nom,$prenom);
    abstract function getOne($id_joueur);

    abstract function getAll();

    // Method to test the database connection
    public function testerConnexion()
    {
        if ($this->pdo) {
            return "Connexion réussie à la base de données !";
        } else {
            return "Échec de la connexion !";
        }
    }
}
