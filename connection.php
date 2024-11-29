<?php
// connection.php

// Configuration des paramètres de connexion à la base de données
$host = "serveurmysql.mysql.database.azure.com"; // Nom d'hôte Azure
$username = "Ikram_Guessous@serveurmysql"; // Nom d'utilisateur
$password = "Poisson2002"; // Mot de passe
$dbname = "ma_base"; // Nom de la base de données

// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Connexion à la base de données avec gestion des erreurs
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        throw new Exception("Erreur de connexion : " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("Une erreur est survenue : " . $e->getMessage());
}
?>
