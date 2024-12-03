<?php
// Paramètres de connexion à la base de données Azure
$servername = "serveurmysql.mysql.database.azure.com";
$username = "Ikram_Guessous";
$password = "Poisson2002";
$database = "ma_base";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $client_name = $_POST['client_name'];
    $review_text = $_POST['review_text'];
    $rating = $_POST['rating'];
    $client_image = $_POST['client_image'];

    // Validation des données (par exemple, s'assurer que la note est entre 1 et 5)
    if (empty($client_name) || empty($review_text) || empty($rating) || !in_array($rating, [1, 2, 3, 4, 5])) {
        echo "Veuillez remplir tous les champs et fournir une note valide (1 à 5).";
        exit();
    }

    try {
        // Connexion à la base de données MySQL
        $port = 3306;
        $conn = new mysqli($servername, $username, $password, $database, $port);

        // Vérification de la connexion
        if ($conn->connect_error) {
            throw new Exception("Connexion échouée : " . $conn->connect_error);
        }

        // Requête pour insérer un nouvel avis
        $query = "INSERT INTO reviews (client_name, review_text, stars, client_image) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssis", $client_name, $review_text, $rating, $client_image); // "s" pour string, "i" pour int

        if ($stmt->execute()) {
            echo "Avis soumis avec succès !";
        } else {
            throw new Exception("Erreur lors de l'ajout de l'avis : " . $stmt->error);
        }

        // Libérer les ressources
        $stmt->close();
    } catch (Exception $e) {
        echo "Une erreur est survenue : " . $e->getMessage();
    } finally {
        $conn->close();
    }
}
?>
