<?php
// Paramètres de connexion à la base de données Azure
$servername = "serveurmysql.mysql.database.azure.com";
$username = "Ikram_Guessous";
$password = "Poisson2002";
$database = "ma_base";

try {
    // Connexion à la base de données MySQL
    $conn = new mysqli($servername, $username, $password, $database, 3306);

    // Vérification de la connexion
    if ($conn->connect_error) {
        throw new Exception("Connexion échouée : " . $conn->connect_error);
    }

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $review = $_POST['review'];
        $rating = $_POST['rating'];

        // Gérer l'image (si une image a été téléchargée)
        $image = ""; // Valeur par défaut si aucune image n'est fournie
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            // Déplacer l'image téléchargée vers un répertoire spécifique
            $uploadDir = "uploads/";
            $uploadFile = $uploadDir . basename($_FILES['image']['name']);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $image = $uploadFile; // Stocker le chemin de l'image
            } else {
                throw new Exception("Erreur lors du téléchargement de l'image.");
            }
        }

        // Insérer les données dans la base de données
        $stmt = $conn->prepare("INSERT INTO reviews (client_name, review_text, stars, client_image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $name, $review, $rating, $image);
        
        if ($stmt->execute()) {
            echo "Avis soumis avec succès !";
        } else {
            throw new Exception("Erreur lors de l'insertion de l'avis : " . $stmt->error);
        }

        // Fermer le statement
        $stmt->close();
    }
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
} finally {
    // Fermer la connexion à la base de données
    $conn->close();
}
?>
