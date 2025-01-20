import Splide from '@splidejs/splide'
import Rellax from 'rellax'
import '@splidejs/splide/css' // Import Splide styles

const slider = document.querySelector('.hero-slider')
if (slider) {
  const splide = new Splide(slider, {
    type: 'fade',
    heightRatio: 0.5,
    autoplay: true,
    pauseOnHover: false,
    arrows: true,
    pagination: true,
    cover: true
  }).mount()
}

const rellaxElements = document.querySelectorAll('.rellax')

if (rellaxElements.length) {
  new Rellax('.rellax', {
    speed: 25, // Adjust the speed; negative for slower scroll
    center: false, // Whether to center the parallax effect
    wrapper: null, // Parent element for parallax
    vertical: true, // Enable vertical parallax
    horizontal: false // Disable horizontal parallax
  })
}
