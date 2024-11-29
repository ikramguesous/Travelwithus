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
  .heading{
    background-size: cover !important;
    background-position: center !important;
    padding-top: 8rem;
    padding-bottom: 13rem;
    height:500px;
    
}
.heading h1{
    font-size: 8rem;
    text-transform: uppercase;
    color: var(--white);
    text-shadow: var(--text-shadow);
}
</style>
</head>

<body>
<section class="header">
  <a href="home.php" class="logo">Travel With Us</a>
  <nav class="navbar">
    <a href="home.php">Home</a>
    <a href="About.php">About</a>
    <a href="Book.php">Book</a>
  </nav>
  <div id="menu-btn" class="fas fa-bars"></div>
</section>

<div class="heading" style="background:url(images/pexels-andrea-imre-151632551-17472768.jpg) no-repeat" >
  
</div>

<section class="booking">
    <h1 class="heading-title">Book you Trip  </h1>
    <form action="book_form.php" method="post" class="book-form">
        <div class="flex">
            <div class="inputBox">
                <span>Name :</span>
                <input type="text" placeholder="enter your name" name="name">
            </div>
            <div class="inputBox">
                <span>Email:</span>
                <input type="email" placeholder="enter your email" name="email"> 
          </div>
          <div class="inputBox">
                <span>Phone :</span>
                <input type="number" placeholder="enter your number" name="phone"> 
          </div>
          <div class="inputBox">
                <span>Adress :</span>
                <input type="text" placeholder="enter your address" name="address"> 
          </div>
          <div class="inputBox">
                <span>Where To :</span>
                <input type="text" placeholder="place you want to visit" name="location"> 
          </div>
          <div class="inputBox">
                <span>How Many :</span>
                <input type="number" placeholder="number of guests" name="guests"> 
          </div>
          <div class="inputBox">
    <span>Arrivals :</span>
    <input type="date" placeholder="arrivals" name="arrivals"> 
</div>
<div class="inputBox">
    <span>Leaving :</span>
    <input type="date" placeholder="leaving" name="leaving"> 
</div>
        </div>
        <input type="submit" value="submit" class="btn" name="send">
    </form>
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
</body>

</html>