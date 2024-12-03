<?php
// Configuration de la base de données
$host = 'serveurmysql.mysql.database.azure.com'; // Exemple : localhost
$username = 'Ikram_Guessous';
$password = 'Poisson2002';
$database = 'ma_base';
$connection = mysqli_connect($host, $username, $password, $database);

// Vérifier si le package_id est passé dans l'URL
$package_id = isset($_GET['package_id']) ? intval($_GET['package_id']) : null;

// Si aucun package_id n'est défini, afficher une alerte et rediriger
if (!$package_id) {
    echo "<script>
            alert('Please select a package before booking.');
            window.location.href = 'package.php'; // Redirection vers la page des packages
          </script>";
    exit; // Arrêter l'exécution du script
}

// Récupérer les détails du package, y compris la disponibilité
$query = "SELECT * FROM packages WHERE id_package = ?";
$stmt = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($stmt, 'i', $package_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Vérifier si le package existe
if (mysqli_num_rows($result) == 0) {
    die('Package not found');
}

$package = mysqli_fetch_assoc($result);
$availability_date = $package['availability_date'];
$places_available = $package['places_available']; // Nombre de places disponibles

// Gérer la soumission du formulaire de réservation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? mysqli_real_escape_string($connection, $_POST['name']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : '';
    $phone = isset($_POST['phone']) ? mysqli_real_escape_string($connection, $_POST['phone']) : '';
    $date = $availability_date;

    // Validation basique des champs
    if (empty($name) || empty($email) || empty($phone)) {
        $error_message = 'All fields are required!';
    } elseif ($places_available <= 0) {
        $error_message = 'Sorry, no places available for this package!';
    } else {
        // Insérer la réservation dans la base de données
        $query = "INSERT INTO booking (package_id, name, email, phone, booking_date) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, 'issss', $package_id, $name, $email, $phone, $date);
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            // Mettre à jour le nombre de places disponibles
            $query = "UPDATE packages SET places_available = places_available - 1 WHERE id_package = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, 'i', $package_id);
            mysqli_stmt_execute($stmt);

            $success_message = 'Your booking has been successfully made!';
        } else {
            $error_message = 'Failed to make a booking. Please try again.';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta HTTP-EQUIV="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="style.css?v=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .package-details {
            text-align: center;
            margin-bottom: 20px;
        }

        .package-details img {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }

        .package-details h2 {
            color: #333;
            margin-top: 15px;
        }

        .package-details p {
            color: #666;
        }

        form {
            margin-top: 20px;
        }

        form .form-group {
            margin-bottom: 15px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        form input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            padding: 10px 20px;
            background-color: #555;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }

        .message.success {
            color: green;
        }

        .message.error {
            color: red;
        }
    </style>
</head>
<body>
<section class="header">
  <a href="home.php" class="logo">Travel With Us</a>
  <nav class="navbar">
    <a href="home.php">Home</a>
    <a href="About.php">About</a>
    <a href="package.php">Package</a>
    <a href="Book.php">Book</a>
  </nav>
  <div id="menu-btn" class="fas fa-bars"></div>
</section>

<div class="heading" style="background:url(images/pexels-andrea-imre-151632551-17472768.jpg) no-repeat" >
  
</div>

<div class="container">
    <h1>Book Your Package</h1>

    <!-- Affichage des détails du package -->
    <div class="package-details">
        <img src="images/<?php echo htmlspecialchars($package['image']); ?>" alt="<?php echo htmlspecialchars($package['name']); ?>">
        <h2><?php echo htmlspecialchars($package['name']); ?></h2>
        <p><?php echo htmlspecialchars($package['description']); ?></p>
        <p><strong>Price: $<?php echo number_format($package['price'], 2); ?></strong></p>
    </div>

    <!-- Formulaire de réservation -->
    <form action="book.php?package_id=<?php echo urlencode($package_id); ?>" method="POST">
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Your Phone</label>
            <input type="text" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="date">Booking Date</label>
            <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($availability_date); ?>" readonly>
        </div>

        <button type="submit">Book Now</button>
    </form>

    <!-- Affichage des messages -->
    <?php if (isset($success_message)): ?>
        <div class="message success"><?php echo htmlspecialchars($success_message); ?></div>
    <?php elseif (isset($error_message)): ?>
        <div class="message error"><?php echo htmlspecialchars($error_message); ?></div>
    <?php endif; ?>
</div>
<section class="footer">
  <div class="box-container">
    <div class="box">
      <h3>Quick Links</h3>
      <a href="home.php"><i class="fas fa-angle-right"></i> Home</a>
      <a href="about.php"><i class="fas fa-angle-right"></i> About</a>
      <a href="package.php"><i class="fas fa-angle-right"></i> Package</a>
      <a href="book.php"><i class="fas fa-angle-right"></i> Book</a>
    </div>
    <div class="box">
      <h3>Contact Info</h3>
      <a href="#"><i class="fas fa-phone"></i> +0674554321</a>
      <a href="#"><i class="fas fa-phone"></i> +0522345634</a>
      <a href="#"><i class="fas fa-envelope"></i> ikramkawtar@gmail.com</a>
      <a href="#"><i class="fas fa-map"></i> Casablanca, Morocco</a>
    </div>
    <div class="box">
      <h3>Follow Us</h3>
      <a href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
      <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
      <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
      <a href="#"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
    </div>
  </div>
</section>
</body>
</html>



