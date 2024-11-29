
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

const swiper = new Swiper('.home-slider', {
    loop: true, // Permet un défilement en boucle
    autoplay: {
        delay: 1000, // Temps d'attente en millisecondes entre les swipes
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


  





  



