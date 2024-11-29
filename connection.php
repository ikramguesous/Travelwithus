<?php

$host = 'your_azure_mysql_host'; // Remplacez par l'adresse de votre serveur MySQL Azure
$username = 'your_mysql_username'; // Remplacez par votre nom d'utilisateur MySQL
$password = 'your_mysql_password'; // Remplacez par votre mot de passe MySQL
$dbname = 'your_database_name'; // Remplacez par le nom de votre base de données
$ca_cert_path = './DigiCertGlobalRootCA.crt.pem';  // Remplacez par le chemin réel vers le certificat CA téléchargé

// Connexion à la base de données sans SSL pour tester la connexion
$conn = new mysqli($host, $username, $password, $dbname, 3306);

// Vérification de la connexion de base
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Si la connexion est réussie, configurer SSL
$conn->ssl_set(NULL, NULL, $ca_cert_path, NULL, NULL);  // Appliquez le certificat CA pour la connexion SSL

// Tentative de connexion avec SSL activé
if (!$conn->real_connect($host, $username, $password, $dbname, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    die("Erreur de connexion SSL : " . $conn->connect_error);
}

// Si la connexion SSL est réussie
echo "Connexion réussie avec SSL.";

?>
