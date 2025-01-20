import Splide from '@splidejs/splide'
import { AutoScroll } from '@splidejs/splide-extension-auto-scroll'

// Logo slider
if (typeof Splide !== 'undefined') {
  const logoSliders = document.querySelectorAll('.logos-slider')

  logoSliders.forEach((logoSlider) => {
    const logoSliderMain = logoSlider.querySelector('.logos-list')

    // Initialize Splide for each logo slider
    const slider = new Splide(logoSliderMain, {
      type: 'loop',
      drag: 'free',
      focus: 'center',
      pagination: false,
      perPage: 6,
      autoScroll: {
        speed: 1
      },
      breakpoints: {
        539: {
          perPage: 4
        },
        767: {
          perPage: 4
        }
      }
    })

    // Mount Splide with AutoScroll extension
    slider.mount({ AutoScroll })
  })
}
