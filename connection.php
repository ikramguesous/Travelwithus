<?php
// book_form.php

// Configuration des paramètres de connexion à la base de données
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

// Traitement des données du formulaire
if (isset($_POST['send'])) {
    // Récupérer les valeurs du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $location = $_POST['location'];
    $guests = $_POST['guests'];
    $arrivals = $_POST['arrivals'];
    $leaving = $_POST['leaving'];

    // Requête pour insérer les données dans la base
    $sql = "INSERT INTO reservations (name, email, phone, address, location, guests, arrivals, leaving) 
            VALUES ('$name', '$email', '$phone', '$address', '$location', '$guests', '$arrivals', '$leaving')";

    if ($conn->query($sql) === TRUE) {
        echo "Réservation enregistrée avec succès.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
}
?>
