<?php
// Paramètres de connexion à la base de données Azure
$servername = "serveurmysql.mysql.database.azure.com";
$username = "Ikram_Guessous";
$password = "Poisson2002";
$database = "ma_base";

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_reviews'])) {
    // Récupérer les données envoyées par le formulaire
    $name = isset($_POST['client_name']) ? trim($_POST['client_name']) : '';
    $review_text = isset($_POST['review_text']) ? trim($_POST['review_text']) : '';
    $stars = isset($_POST['rating']) ? intval($_POST['rating']) : 0;
    $image = isset($_POST['client_image']) ? trim($_POST['client_image']) : '';

    // Vérifier que les champs obligatoires sont présents
    if (empty($name) || empty($review_text) || $stars < 1 || $stars > 5) {
        echo "Tous les champs doivent être remplis correctement.";
        exit;
    }

    try {
        // Connexion à la base de données
        $conn = new mysqli($servername, $username, $password, $database, 3306);

       // Vérification de la connexion
if ($conn->connect_error) {
    echo "Erreur de connexion : " . $conn->connect_error;
    exit;
} else {
    echo "Connexion réussie !";  // Message de confirmation
}


        // Préparer la requête d'insertion avec des paramètres liés
        $stmt = $conn->prepare("INSERT INTO reviews (client_name, review_text, stars, client_image) 
                                VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            throw new Exception("Erreur de préparation de la requête : " . $conn->error);
        }

        // Lier les paramètres à la requête préparée
        $stmt->bind_param("ssis", $name, $review_text, $stars, $image);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "Avis ajouté avec succès!";
        } else {
            echo "Erreur lors de l'ajout de l'avis: " . $stmt->error;
        }

        // Fermer la requête préparée
        $stmt->close();
    } catch (Exception $e) {
        echo "Une erreur est survenue : " . $e->getMessage();
    } finally {
        // Fermer la connexion à la base de données
        $conn->close();
    }
}
?>
