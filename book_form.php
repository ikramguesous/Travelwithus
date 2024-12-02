<?php
// Inclure le fichier de connexion
include 'connection.php';

if (isset($_POST['send'])) {
    try {
        // Récupérer les valeurs du formulaire
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $location = $_POST['location'] ?? '';
        $guests = $_POST['guests'] ?? 0;

        // Vérifier les champs obligatoires (Nom, Email, Téléphone)
        if (empty($name) || empty($email) || empty($phone)) {
            throw new Exception("Les champs Nom, Email et Téléphone sont obligatoires.");
        }

        // Si des champs sont vides, ne pas insérer dans la base de données
        if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($location) || empty($guests)) {
            throw new Exception("Tous les champs sont requis.");
        }

        // Préparer la requête
        $stmt = $conn->prepare("INSERT INTO book_form (name, email, phone, address, location, guests) 
                                VALUES (?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            throw new Exception("Erreur lors de la préparation de la requête : " . $conn->error);
        }

        // Lier et exécuter la requête
        $stmt->bind_param("sssssi", $name, $email, $phone, $address, $location, $guests);  // Remarquez le 'i' pour guests (entier)
        if ($stmt->execute()) {
            echo "Réservation enregistrée avec succès.";
        } else {
            throw new Exception("Erreur lors de l'exécution de la requête : " . $stmt->error);
        }

        $stmt->close();
    } catch (Exception $e) {
        echo "Une erreur est survenue : " . $e->getMessage();
    } finally {
        $conn->close();
    }
}
?>
