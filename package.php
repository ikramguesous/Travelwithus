<?php
// Configuration de la base de données
$host = 'serveurmysql.mysql.database.azure.com'; // Exemple : localhost
$username = 'Ikram_Guessous';
$password = 'Poisson2002';
$database = 'ma_base';
$connection = mysqli_connect($host, $username, $password, $database);

// Vérification de la connexion
if (!$connection) {
    die('Erreur de connexion : ' . mysqli_connect_error());
}

// Récupération de la date si fournie
$date = isset($_GET['date']) ? $_GET['date'] : null;

// Requête SQL
$sql = "SELECT * FROM packages";
if ($date) {
    $sql .= " WHERE availability_date = '" . mysqli_real_escape_string($connection, $date) . "'";
}

// Exécution de la requête
$result = mysqli_query($connection, $sql);

// Vérification des résultats
$packages = [];
if ($result && mysqli_num_rows($result) > 0) {
    $packages = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "<p>Aucun package disponible pour la date sélectionnée.</p>";
}

// Fermeture de la connexion à la base de données
mysqli_close($connection);
?>

<html lang="en">
<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta HTTP-EQUIV="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="style.css">
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    h1 {
        text-align: center;
        margin: 20px 0;
        color: #333;
    }

    form {
        background-color: #fff;
        text-align: center;
        margin-bottom: 20px;
        border: 2px solid var(--main-color);
        border-radius: 5px;
        padding: 10px 150px;
    }

    form input[type="date"] {
        padding: 10px 30px;
        margin-right: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    form button {
        padding: 10px 50px;
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .packages {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
    }

    .package {
        background: white;
        border: 1px solid #ddd;
        border-radius: 10px;
        width: 300px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
        overflow: hidden;
        transition: opacity 0.3s, filter 0.3s;
    }

    .package img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .package h2 {
        color: var(--main-color);
        margin: 15px 0;
        font-size: 25px;
    }

    .package p {
        color: var(--black);
        padding: 0 15px;
        font-size: 12px;
        font-style: italic;
        margin-bottom: 15px;
    }

    .package button {
        padding: 10px 20px;
        background-color: var(--main-color);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-bottom: 15px;
    }

    .package.grayscale {
        filter: grayscale(100%);
        opacity: 0.6;
        pointer-events: none;
    }

    .package .unavailable {
        color: red;
        font-weight: bold;
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

<div class="heading" style="background:url(RRRR.png) no-repeat" >
   <h1>Package</h1>
</div>

<!-- Section pour choisir une date -->
<section class="date-selection">
    <div class="search-bar">
        <form action="package.php" method="GET">
            <h2>Select a Date</h2>
            <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($date); ?>">
            <button type="submit">Search</button>
        </form>
    </div>
</section>
<section>
<!-- Section pour afficher les packages -->
<div class="packages">
        <?php if (!empty($packages)): ?>
            <?php foreach ($packages as $package): ?>
                <div class="package">
                    <img src="images/<?php echo htmlspecialchars($package['image']); ?>" alt="<?php echo htmlspecialchars($package['name']); ?>">
                    <h2><?php echo htmlspecialchars($package['name']); ?></h2>
                    <p><?php echo htmlspecialchars($package['description']); ?></p>
                    <p>Prix : <?php echo htmlspecialchars($package['price']); ?> €</p>
                    <p>Places disponibles : <?php echo htmlspecialchars($package['places_available']); ?></p>
                    <p>Date de disponibilité : <?php echo htmlspecialchars($package['availability_date']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun package trouvé.</p>
        <?php endif; ?>
    </div>
    </section>
<!-- Section Footer -->
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