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

    // Traitement du formulaire de soumission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $conn->real_escape_string($_POST['name']);
        $review = $conn->real_escape_string($_POST['review']);
        $stars = (int)$_POST['stars'];
        $image = $conn->real_escape_string($_POST['image']); // Optionnel

        if ($name && $review && $stars) {
            $insertQuery = "INSERT INTO reviews (client_name, review_text, stars, client_image) VALUES ('$name', '$review', $stars, '$image')";
            if (!$conn->query($insertQuery)) {
                throw new Exception("Erreur lors de l'ajout de l'avis : " . $conn->error);
            }
            echo '<p>Avis ajouté avec succès !</p>';
        } else {
            echo '<p>Veuillez remplir tous les champs obligatoires.</p>';
        }
    }

    // Requête pour récupérer les avis
    $query = "SELECT client_name AS name, review_text AS review, stars AS rating, client_image AS image FROM reviews";
    $result = $conn->query($query);

    if (!$result) {
        throw new Exception("Erreur lors de la récupération des avis : " . $conn->error);
    }

    // Affichage des avis
    echo '<div class="reviews">';
    if ($result->num_rows > 0) {
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
    echo '</div>';

    // Libérer les ressources
    $result->free();
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
} finally {
    $conn->close();
}
?>

<!-- Formulaire HTML -->
<div class="review-form">
    <h3>Donnez votre avis</h3>
    <form method="POST" action="">
        <label for="name">Votre nom :</label>
        <input type="text" id="name" name="name" required>

        <label for="review">Votre avis :</label>
        <textarea id="review" name="review" required></textarea>

        <label for="stars">Note :</label>
        <select id="stars" name="stars" required>
            <option value="5">5 étoiles</option>
            <option value="4">4 étoiles</option>
            <option value="3">3 étoiles</option>
            <option value="2">2 étoiles</option>
            <option value="1">1 étoile</option>
        </select>

        <label for="image">URL de votre photo (facultatif) :</label>
        <input type="text" id="image" name="image" placeholder="Exemple : images/mon_image.jpg">

        <button type="submit">Envoyer</button>
    </form>
</div>

<!-- Styles CSS (facultatifs) -->
<style>
    .review-form {
        margin: 20px 0;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        max-width: 500px;
    }
    .review-form h3 {
        margin-bottom: 15px;
    }
    .review-form label {
        display: block;
        margin: 10px 0 5px;
    }
    .review-form input, .review-form textarea, .review-form select, .review-form button {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .review-form button {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }
    .review-form button:hover {
        background-color: #45a049;
    }
</style>
