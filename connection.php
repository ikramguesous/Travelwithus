<?php
// Configuration des paramètres de connexion à la base de données
$host = "serveurmysql.mysql.database.azure.com"; // Nom d'hôte Azure
$username = "Ikram_Guessous@serveurmysql"; // Nom d'utilisateur
$password = "Poisson2002"; // Mot de passe
$dbname = "ma_base"; // Nom de la base de données

// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Connexion à la base de données avec gestion des erreurs
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        throw new Exception("Erreur de connexion : " . $conn->connect_error);
    }

    // Traitement des données du formulaire
    if (isset($_POST['send'])) {
        // Récupérer les valeurs du formulaire et valider les données
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $location = $_POST['location'] ?? '';
        $guests = $_POST['guests'] ?? 0;
        $arrivals = $_POST['arrivals'] ?? '';
        $leaving = $_POST['leaving'] ?? '';

        // Vérifier que les champs obligatoires ne sont pas vides
        if (empty($name) || empty($email) || empty($phone)) {
            throw new Exception("Les champs Nom, Email et Téléphone sont obligatoires.");
        }

        // Utiliser des requêtes préparées pour éviter les injections SQL
        $stmt = $conn->prepare("INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        if (!$stmt) {
            throw new Exception("Erreur lors de la préparation de la requête : " . $conn->error);
        }

        // Lier les paramètres
        $stmt->bind_param("ssssssss", $name, $email, $phone, $address, $location, $guests, $arrivals, $leaving);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "Réservation enregistrée avec succès.";
        } else {
            throw new Exception("Erreur lors de l'exécution de la requête : " . $stmt->error);
        }

        // Fermer la requête préparée
        $stmt->close();
    }
} catch (Exception $e) {
    echo "Une erreur est survenue : " . $e->getMessage();
} finally {
    // Fermer la connexion si elle existe
    if (isset($conn) && $conn) {
        $conn->close();
    }
}
?>
