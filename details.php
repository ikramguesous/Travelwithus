<?php
$host = 'serveurmysql.mysql.database.azure.com'; // Exemple : localhost
$username = 'Ikram_Guessous';
$password = 'Poisson2002';
$database = 'ma_base';
$connection = mysqli_connect($host, $username, $password, $database);

// Vérification de la connexion
if (!$connection) {
    die('Erreur de connexion : ' . mysqli_connect_error());
}


// Récupérer l'ID du package depuis l'URL
$package_id = isset($_GET['package_id']) ? intval($_GET['package_id']) : null;

// Vérifier si l'ID est défini
if (!$package_id) {
    die('Invalid package ID');
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
$availability_date = $package['availability_date']; // Récupérer la date de disponibilité


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

        

        .package-details p {
            text-align: left; /* Aligner tout le texte à gauche */
            margin-top: 10px;
            margin-bottom: 10px;
            line-height: 1.5;
            font-size: 17px;
            
        }

        /* Format spécifique pour le détail du voyage */
        .package-details .itinerary {
            margin-top: 10px; /* Espacement en haut pour la section "Details" */
        }

        .package-details strong {
            font-weight: bold; /* Mettre en gras le texte dans les balises <strong> */
        }

        .package-details h2 {
            color: var(--main-color);
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 35px;
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
    <h1>Package details</h1>

    <!-- Affichage des détails du package -->
    <div class="package-details">
    <img src="images/<?php echo htmlspecialchars($package['image']); ?>" alt="<?php echo htmlspecialchars($package['name']); ?>">
    <h2><?php echo htmlspecialchars($package['name']); ?></h2>
    <p><?php echo htmlspecialchars($package['description']); ?></p>
    <p><strong>Price: $<?php echo number_format($package['price'], 2); ?></strong></p>
    <p><strong>Duration: <?php echo number_format($package['duration']); ?> days</strong></p>
    
    <!-- Détails du voyage -->
    <p class="itinerary"><strong>Details:</strong><br>
    <?php 
        // Remplacer les tirets (-), les points (.), et les deux-points (:) par des balises <br>
        $itinerary = str_replace(
            ['- ', '. ', ': ', '.  '], 
            ['<br>- ', '.<br>', ':<br>', '. <br>'], 
            htmlspecialchars($package['itinerary'])
        ); 
        // Afficher le texte modifié
        echo $itinerary;
    ?>
    </p>
</div>


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
      <a href="https://www.facebook.com/profile.php?id=100086959579779" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a>
      <a href="#"><i class="fab fa-twitter"></i> Twitter</a>
      <a href="#"><i class="fab fa-instagram"></i> Instagram</a>
      <a href="#"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
    </div>
  </div>
</section>
</body>
</html>