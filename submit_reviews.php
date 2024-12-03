<?php
// Paramètres de connexion à la base de données Azure
$servername = "serveurmysql.mysql.database.azure.com";
$username = "Ikram_Guessous";
$password = "Poisson2002";
$database = "ma_base";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_reviews'])) {
    $name = $_POST['client_name']; // Nom du client
    $review_text = $_POST['review_text']; // Texte de l'avis
    $stars = $_POST['rating']; // Note en étoiles (1 à 5)
    $image = $_POST['client_image']; // URL ou chemin de l'image du client

    try {
        // Connexion à la base de données
        $conn = new mysqli($servername, $username, $password, $database, 3306);

        // Vérification de la connexion
        if ($conn->connect_error) {
            throw new Exception("Connexion échouée : " . $conn->connect_error);
        }

        // Nettoyer les données pour prévenir les injections SQL
        $name = mysqli_real_escape_string($conn, $name);
        $review_text = mysqli_real_escape_string($conn, $review_text);
        $stars = intval($stars);
        $image = mysqli_real_escape_string($conn, $image);

        // Requête d'insertion de l'avis
        $query = "INSERT INTO reviews (client_name, review_text, stars, client_image) 
                  VALUES ('$name', '$review_text', $stars, '$image')";

        if (mysqli_query($conn, $query)) {
            echo "Avis ajouté avec succès!";
        } else {
            echo "Erreur lors de l'ajout de l'avis: " . mysqli_error($conn);
        }
    } catch (Exception $e) {
        echo "Une erreur est survenue : " . $e->getMessage();
    } finally {
        $conn->close();
    }
}
?>
