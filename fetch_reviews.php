<?php
// Paramètres de connexion à la base de données Azure
$servername = "serveurmysql.mysql.database.azure.com";
$username = "Ikram_Guessous";
$password = "Poisson2002";
$database = "ma_base";

try {
    // Connexion à la base de données MySQL
    $port = 3306;
    $conn = new mysqli($servername, $username, $password, $database, $port);

    // Vérification de la connexion
    if ($conn->connect_error) {
        throw new Exception("Connexion échouée : " . $conn->connect_error);
    }

    // Requête pour récupérer les avis
    $query = "SELECT client_name AS name, review_text AS review, stars AS rating, client_image AS image FROM reviews";
    $result = $conn->query($query);

    if (!$result) {
        throw new Exception("Erreur lors de la récupération des avis : " . $conn->error);
    }

    // Vérifier si des avis existent
    if ($result->num_rows > 0) {
        // Générer les avis dynamiques
        while ($row = $result->fetch_assoc()) {
            echo '<div class="swiper-slide slide">';
            echo '<div class="stars">';
            for ($i = 0; $i < $row['rating']; $i++) {
                echo '<i class="fas fa-star"></i>';
            }
            echo '</div>';
            echo '<p><em>"' . htmlspecialchars($row['review']) . '"</em></p>';
            echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
            echo '<img src="' . htmlspecialchars($row['image']) . '" alt="Client photo">';
            echo '</div>';
        }
    } else {
        echo '<p>Aucun avis disponible pour le moment.</p>';
    }

    // Libérer les ressources
    $result->free();
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
} finally {
    $conn->close();
}
?>
