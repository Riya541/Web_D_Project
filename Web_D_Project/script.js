let index = 0;
const slidesContainer = document.querySelector('.slides');
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function slideShow() {
    index = (index + 1) % totalSlides;
    slidesContainer.style.transform = `translateX(-${index * 100}vw)`;
}

setInterval(slideShow, 4000);
