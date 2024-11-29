<?php
// connection.php

// Configuration des paramètres de connexion à la base de données
$host = "serveurmysql.mysql.database.azure.com"; // Nom d'hôte Azure
$username = "Ikram_Guessous"; // Nom d'utilisateur
$password = "Poisson2002"; // Mot de passe
$dbname = "ma_base"; // Nom de la base de données
$ca_cert_path = "DigiCertGlobalRootCA.crt.pem"; // Chemin du certificat SSL téléchargé

// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Connexion à la base de données avec SSL
    $conn = new mysqli($host, $username, $password, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        throw new Exception("Erreur de connexion : " . $conn->connect_error);
    }

    // Configuration SSL
    $conn->ssl_set(NULL, NULL, $ca_cert_path, NULL, NULL); // Utilisation du certificat CA
    $conn->real_connect($host, $username, $password, $dbname, 3306, NULL, MYSQLI_CLIENT_SSL);

} catch (Exception $e) {
    die("Une erreur est survenue : " . $e->getMessage());
}
?>
