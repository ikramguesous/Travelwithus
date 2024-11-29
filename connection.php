<?php
// Configuration des paramètres de connexion
$host = "serveurmysql.mysql.database.azure.com"; // Remplacez par votre nom d'hôte
$username = "Ikram_Guessous"; // Remplacez par votre nom d'utilisateur
$password = "Poisson2002"; // Remplacez par votre mot de passe
$dbname = "ma_base"; // Remplacez par le nom de votre base de données

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}
echo "Connexion réussie à la base de données.";
?>