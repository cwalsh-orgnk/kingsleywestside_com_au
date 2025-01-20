import 'vite/modulepreload-polyfill'
import FlyntComponent from './scripts/FlyntComponent'
import { initAllGSAPAnimations } from './scripts/gsapController'
import 'lazysizes'
import gsap from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import Lenis from 'lenis'
import sal from 'sal.js'

const lenis = new Lenis()

lenis.on('scroll', (e) => {

})

function raf (time) {
  lenis.raf(time)
  requestAnimationFrame(raf)
}

requestAnimationFrame(raf)

gsap.registerPlugin(ScrollTrigger)

document.addEventListener('DOMContentLoaded', () => {
  const container = document.querySelector('.mainContent') // Replace with your container
  gsap.fromTo(
    container.querySelectorAll('.container'), // Target elements
    {
      translateY: 60, // Starting position (60px lower)
      opacity: 0 // Starting opacity (fully hidden)
    },
    {
      delay: 0.8, // Wait before starting the animation
      duration: 0.8, // Duration of the animation
      translateY: 0, // Ending position (default)
      opacity: 1, // Ending opacity (fully visible)
      stagger: 0.4 // Stagger start times
    }
  )
  setTimeout(() => {
    sal({
      threshold: 0.21,
      once: true
    })
  }, 800)
})

document.addEventListener('DOMContentLoaded', () => {
  initAllGSAPAnimations()
})

window.addEventListener('resize', () => {

})

// Example of re-initializing after content reload:
document.addEventListener('contentReloaded', () => {
  initAllGSAPAnimations()
})

if (import.meta.env.DEV) {
  import('@vite/client')
}

import.meta.glob([
  '../Components/**',
  '../assets/**',
  '!**/*.js',
  '!**/*.scss',
  '!**/*.php',
  '!**/*.twig',
  '!**/screenshot.png',
  '!**/*.md'
])

window.customElements.define('flynt-component', FlyntComponent)
