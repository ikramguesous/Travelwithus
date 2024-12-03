<!DOCTYPE html>
<html lang="en">
<head>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <meta charset="UTF-8">
  <meta HTTP-EQUIV="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>about</title>
  <link rel="stylesheet" href="style.css?v=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
<style>
    .heading{
    background-size: cover !important;
    background-position: center !important;
    padding-top: 8rem;
    padding-bottom: 13rem;
    height:490px;
    
}
.heading h1{
    font-size: 8rem;
    text-transform: uppercase;
    color: var(--white);
    text-shadow: var(--text-shadow);
}
.about{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 3rem;
}
.about .image{
    flex: 1 1 41rem;
}
.about .image img{
    width: 100%;
}
.about .content{
    flex: 1 1 41rem;
    text-align: center;
}
.about .content h3{
    font-size: 3rem;
    color: var(--black);
    font-family: 'Playfair Display', serif;
}
.about .content p{
    font-size: 1.5rem;
    color: var(--light-black);
    line-height: 2;
    padding: 1rem 0;
    font-family: 'Playfair Display', serif;
}
.about .content .icons-containers {
    margin-top:2rem;
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    align-items: flex-end;
}
.about .content .icons-containers .icons{
    background: var(--light-bg);
    padding: 2rem; 
    flex: 1 1 16rem;   
}
.about .content .icons-containers .icons i{
    font-size: 4rem;
    margin-bottom: 1rem;
    color: var(--main-color);
}
.about .content .icons-containers .icons span{
    font-size: 1.5rem;
    color: var(--light-black);
    display: block;
}
.reviews{
    background: var(--light-bg)
}
.reviews .slide{
    padding: 2rem;
    border: var(--border);
    background: var(--white);
    text-align: center;
    box-shadow: var(--box-shadow);
    user-select: none;
}
.reviews .slide .stars {
    padding-bottom: .5rem;
}
.reviews .slide .stars i{
    font-size: 1.7rem;
    color: var(--main-color);
}
.reviews .slide p{
    font-size: 1.5rem;
    color: var(--light-black);
    line-height: 2;
    padding: 1rem 0;
}
.reviews .slide h3{
    font-size: 2rem;
    color: var(--black);
}
.reviews .slide span{
    font-size: 1.5rem;
    color: var(--main-color);
    display: block;
}
.reviews .slide img{
    height: 7rem;
    width: 7rem;
    border-radius: 50%;
    margin-top: 1rem;
}
.heading-title {
    font-family: 'Playfair Display', serif;
}

.chat-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 350px;
    max-width: 100%;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    z-index: 1000;
    display: flex;
    flex-direction: column;
    height:200px;
}

.chat-header {
    background-color: var(--main-color);
    color: #fff;
    padding: 10px;
    text-align: center;
    font-size: 18px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.chat-box {
    max-height: 400px;
    overflow-y: auto;
    padding: 10px;
    background-color: #f9f9f9;
    border-bottom: 1px solid #ddd;
    display: flex;
    flex-direction: column;
}

.chat-bubble {
    max-width: 80%;
    padding: 10px;
    margin: 5px 0;
    border-radius: 10px;
    line-height: 1.4;
}

.bot-message {
    background-color: #e0e0e0;
    align-self: flex-start; /* Align to the left */
    margin-right: auto; /* Ensure there's space on the right side */
}

.user-message {
    background-color: var(--main-color);
    color: white;
    align-self: flex-end; /* Align to the right */
    margin-left: auto; /* Ensure there's space on the left side */
}

.chat-form {
    display: flex;
    padding: 10px;
    border-top: 1px solid #ddd;
}

.chat-form input {
    width: 80%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-right: 10px;
}

.chat-form button {
    padding: 10px;
    background-color: var(--main-color);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.chat-form button:hover {
    background-color: var(--main-color);
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

<div class="heading" style="background:url(images/zajou.png) no-repeat" >
   <h1>about us</h1>
</div>


<section class="about">
  <div class="image">
    <img src="images/vertical-shot-red-carpet-middle-lamps-stick-tripod-with-rock-distance.jpg" alt="">
  </div>
  <div class="content">
    <h3>Why Choose Us?</h3>
    <p>Explore Morocco like never before with our booking platform dedicated to creating unforgettable experiences. 
        Whether you're a fan of sunny beaches, majestic mountains, golden deserts, or vibrant imperial cities, 
        we have everything you need for your perfect journey.</p>
    <p>Our mission is to make your travels simple, affordable, and personalized. With a wide range of hotels, 
        tours, and authentic activities tailored to your preferences, we ensure every moment of your trip is 
        filled with wonder and excitement.</p>
    <div class="icons-containers">
      <div class="icons">
        <i class="fas fa-map"></i>
        <span>Top Destinations</span>
      </div>
      <div class="icons">
        <i class="fas fa-hand-holding-usd"></i>
        <span>Affordable Price</span>
      </div>
      <div class="icons">
        <i class="fas fa-headset"></i>
        <span>Guide Service</span>
      </div>
    </div>
  </div>
</section>

<section class="reviews">
  <h1 class="heading-title">Client Reviews</h1>
  <div class="swiper reviews-slider">
    <div class="swiper-wrapper">
      <?php include 'fetch_reviews.php'; ?>
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
var swiper = new Swiper(".reviews-slider", {
    loop: true,
    spaceBetween: 20,
    autoHeight: true,
    grabCursor: true,
    slidesPerView: 5, // Valeur par défaut
    breakpoints: {
        640: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
    },
});

</script>

<script>
    async function fetchReviews() {
        try {
            const response = await fetch('fetch_reviews.php');
            const reviews = await response.json();

            const reviewsContainer = document.querySelector('.swiper-wrapper');
            reviewsContainer.innerHTML = ''; // Efface les anciens avis

            reviews.forEach(review => {
                const stars = '<i class="fas fa-star"></i>'.repeat(review.stars);
                
                const reviewHTML = 
                    <div class="swiper-slide slide">
                        <div class="stars">
                            ${stars}
                        </div>
                        <p><em>"${review.review_text}"</em></p>
                        <h3>${review.client_name}</h3>
                        <img src="${review.client_image}" alt="">
                    </div>
                ;
                reviewsContainer.innerHTML += reviewHTML;
            });

            // Initialiser ou réinitialiser Swiper
            const swiper = new Swiper('.reviews-slider', {
                loop: true,
                autoplay: { delay: 5000 },
                navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
            });
        } catch (error) {
            console.error('Erreur lors de la récupération des avis :', error);
        }
    }

    // Charger les avis au chargement de la page
    document.addEventListener('DOMContentLoaded', fetchReviews);
</script>


<script src="script.js"></script>
<?php
$responses = [
    ["keywords" => ["hello", "hi", "hey", "greetings"], "response" => "Hello! How can I assist you today?"],
    ["keywords" => ["book", "booking", "reserve"], "response" => "To book a trip, please visit the 'Book' page."],
    ["keywords" => ["travel", "trip", "journey"], "response" => "Explore Morocco offers fantastic trips across Morocco!"],
    ["keywords" => ["contact", "support"], "response" => "You can contact us through the 'About Us' page."],
    ["keywords" => ["marrakech", "tour in marrakech", "visit marrakech"], "response" => "Explore Morocco offers amazing tours in Marrakech. Check out our 'Book' page."],
    ["keywords" => ["beach", "sea", "coast"], "response" => "The best beaches are in Al Hoceima, Tangier, and Essaouira."],
    ["keywords" => ["hike", "mountain", "adventure"], "response" => "For mountain adventures, visit Imlil in the High Atlas, or go trekking in the Rif Mountains near Chefchaouen."],
    ["keywords" => ["history", "culture", "historical sites"], "response" => "Fes and Meknes are great for exploring historical sites, including the Medina and ancient palaces."],
    ["keywords" => ["luxury", "5-star", "resort"], "response" => "For luxury stays, you can visit Marrakech, where there are many high-end resorts and spas."],
    ["keywords" => ["shopping", "souks", "markets"], "response" => "Visit Marrakech and Fes for vibrant souks, where you can find traditional Moroccan crafts and textiles."],
    ["keywords" => ["nightlife", "bars", "clubs"], "response" => "Marrakech and Casablanca have vibrant nightlife with a variety of bars and clubs."],
    ["keywords" => ["relax", "spa", "wellness"], "response" => "For relaxation, Essaouira and Marrakech are great choices with their serene environment and luxurious spas."],
    // Specific city responses
    ["keywords" => ["casablanca"], "response" => "Casablanca is known for its modern architecture, beautiful beaches, and vibrant city life."],
    ["keywords" => ["rabat"], "response" => "Rabat is the capital of Morocco and offers a mix of historical sites, beautiful beaches, and modern attractions."],
    ["keywords" => ["chefchaouen"], "response" => "Chefchaouen is famous for its blue-painted streets and mountain views, perfect for relaxing and photography."],
    ["keywords" => ["essaouira"], "response" => "Essaouira is a coastal city with a rich history, famous for its beaches, seafood, and historical medina."],
    ["keywords" => ["fes"], "response" => "Fes is one of Morocco's most culturally rich cities, with its ancient medina and historical landmarks."],
    ["keywords" => ["tangier"], "response" => "Tangier offers beautiful beaches, historical sites, and a mix of cultures, with great spots to relax and explore."],
    ["keywords" => ["al hoceima"], "response" => "Al Hoceima is a coastal city known for its pristine beaches and stunning natural landscapes."],
    ["keywords" => ["imlil"], "response" => "Imlil is a small village in the High Atlas Mountains, perfect for hiking and exploring the natural beauty of Morocco."],
    ["keywords" => ["merzouga"], "response" => "Merzouga is the gateway to the Sahara Desert, where you can enjoy camel treks and experience the vast dunes."],
    ["keywords" => ["agadir"], "response" => "Agadir is known for its beach resorts, water sports, and the lively seaside promenade."],
];

// Initialize an empty response
$response = "I'm sorry, I don't understand your question. Please try again.";

// Handle the message from the user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = strtolower(trim($_POST['message'])); // Normalize user message

    // Search for a matching keyword in the user's message
    foreach ($responses as $entry) {
        foreach ($entry['keywords'] as $keyword) {
            if (strpos($message, $keyword) !== false) {
                $response = $entry['response'];
                break 2; // Exit both loops when a match is found
            }
        }
    }
}
?>

<!-- Chatbot Interface -->
<!-- Chatbot Interface -->
<div class="chat-container">
    <div class="chat-header">
        <h3>Chat with us</h3>
    </div>
    <div class="chat-box" id="chat-box">
        <!-- Display User Message and Bot Response -->
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <!-- User's message displayed on the right -->
            <div class="chat-bubble user-message"><?php echo htmlspecialchars($_POST['message']); ?></div>
            <!-- Bot's response displayed on the left -->
            <div class="chat-bubble bot-message"><?php echo $response; ?></div>
        <?php else: ?>
            <!-- Initial message from bot -->
            <div class="chat-bubble bot-message">Hi, welcome! Ask me about Morocco and I will help you find the best destinations.</div>
        <?php endif; ?>
    </div>
    <form method="POST" class="chat-form">
        <input type="text" name="message" id="user-input" placeholder="Ask something..." required>
        <button type="submit">Send</button>
    </form>
</div>
</body>
</html>