<!DOCTYPE html>
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
    .see-more-btn {
    text-align: center;
    margin-top: 20px;
}

.see-more-btn .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: var(--main-color);
    color: white;
    font-size: 16px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
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

<section class="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background:url(images/projet.png) no-repeat; ; ">
                <div class="content">
                    
                    <h3>Discover Morocco</h3>
                    <span>Explore, Discover, Travel</span>
                    
                    
                </div>
                
               
                
               </div>
               <div class="swiper-slide" style="background:url(images/zaz.png) no-repeat;  ">
                <div class="content">
                    
                    
                    
                    
                </div>
                
               
                
               </div>
               <div class="swiper-slide" style="background:url(images/zas.png) no-repeat; ">
                <div class="content">
                    
                    
                    
                    
                </div>
                
            
               </div>

                
    </div>
    
  
        </div>

  </section>




<section class="home-about">
    <div class="image">
        <img src="images/pexels-harriet-b-392993362-17115609.jpg" alt="">
    </div>
    <div class="content">
        <h3>About us</h3>
        <p>Explore Morocco, a land of diverse landscapes and rich culture. From desert dunes to the Atlas Mountains, enjoy unforgettable adventures and unique experiences.</p>
        <a href="about.php" class="btn">Read More</a>
    </div>
</section>

<section class="home-packages">
    <h1 class="heading-title">Some Of Our Packages</h1>
    <div class="box-container">
        <div class="box">
            <div class="image">
                <img src="images/m.png" alt="">
            </div>
            <div class="content">
                <h3>Marrakech</h3>
                <p><em>"Relax and rejuvenate in Morocco’s serene retreats, offering the perfect balance of nature and tranquility."</em></p>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="images/ik.png" alt="">
            </div>
            <div class="content">
                <h3>Essaouira</h3>
                <p><em>"Immerse yourself in the vibrant culture and rich history of Morocco with our guided tours to iconic destinations."</em></p>
            </div>
        </div>
        <div class="box">
            <div class="image">
                <img src="images/ra.png" alt="">
            </div>
            <div class="content">
                <h3>Tangier</h3>
                <p><em>"Discover breathtaking landscapes and thrilling activities. Perfect for adventure seekers to explore Morocco."</em></p>
            </div>
        </div>
    </div>
    <div class="see-more-btn">
    <a href="package.php" class="btn" style="padding: 15px 30px; font-size: 18px;">See More</a>
</div>
</section>


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
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  const swiper = new Swiper('.home-slider', {
    loop: true, // Permet un défilement en boucle
    autoplay: {
        delay: 3000, // Temps d'attente en millisecondes entre les swipes
        disableOnInteraction: false, // Continue de swiper même après une interaction de l'utilisateur
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
});
</script>

<script src="script.js"></script>


</body>

</html>
