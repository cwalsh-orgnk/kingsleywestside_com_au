import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'
import delegate from 'delegate-event-listener'
import { buildRefs } from '@/assets/scripts/helpers.js'

export default function (el) {
  const overlayPanel = document.querySelector('.mainHeader .overlay-panel')
  const enquiryForm = document.querySelector('.enquiry-form#enquiry-form')
  const enquiryPanel = document.querySelector('.mainHeader .enquiry-panel')
  const enquiryPanelTrigger = document.querySelectorAll('.mainHeader .enquiry-panel-trigger')
  const bodyElem = document.body
  // Callback function to CLOSE the enquiry panel
  function closeEnquiryPanel () {
    const timeoutDuration = parseFloat(window.getComputedStyle(enquiryPanel).transitionDuration) * 1000

    enquiryPanelTrigger.forEach(function (trigger) {
      trigger.classList.remove('open')
      trigger.querySelector('.label-swapper').classList.remove('swap')
    })

    bodyElem.classList.remove('is-enquiry', 'disable-scroll')

    setTimeout(() => {
      enquiryForm.classList.remove('in-view')
    }, timeoutDuration)
  }
  function closeOverlayPanel () {
    if (bodyElem.classList.contains('is-overlay')) {
      const timeoutDuration = overlayPanel.getAttribute('data-transition-delay') ? parseFloat(overlayPanel.getAttribute('data-transition-delay')) * 1000 : 0

      setTimeout(() => {
        bodyElem.classList.remove('is-overlay', 'disable-scroll')
      }, timeoutDuration)
    }
  }
  let isMenuOpen
  const refs = buildRefs(el)
  const navigationHeight = parseInt(window.getComputedStyle(el).getPropertyValue('--navigation-height')) || 0

  const isDesktopMediaQuery = window.matchMedia('(min-width: 1024px)')
  isDesktopMediaQuery.addEventListener('change', onBreakpointChange)

  const menuButtonClickDelegate = delegate('[data-ref="menuButton"]', onMenuButtonClick)
  el.addEventListener('click', menuButtonClickDelegate)

  onBreakpointChange()

  // Disable scroll function
  function disableScroll () {
    const adminBar = document.querySelector('#wpadminbar')
    const adminBarHeight = adminBar && isVisible(adminBar) ? adminBar.offsetHeight : 0

    document.documentElement.style.scrollBehavior = 'initial'

    if (bodyElem.classList.contains('disable-scroll') && !bodyElem.getAttribute('data-offset-top') && !bodyElem.classList.contains('dont-disable-scroll')) {
      const scrollPos = scrollTop() - adminBarHeight

      bodyElem.setAttribute('data-offset-top', scrollPos)
      bodyElem.style.position = 'fixed'
      bodyElem.style.width = '100%'
      bodyElem.style.top = `-${scrollPos}px`
    } else if (!bodyElem.classList.contains('disable-scroll') && bodyElem.getAttribute('data-offset-top')) {
      const scrollPos = bodyElem.getAttribute('data-offset-top') || 0
      bodyElem.removeAttribute('data-offset-top')
      bodyElem.removeAttribute('style')
      window.scrollTo(0, scrollPos)
    }

    document.documentElement.style.scrollBehavior = ''
  }

  function onMenuButtonClick (e) {
    isMenuOpen = !isMenuOpen
    refs.menuButton.setAttribute('aria-expanded', isMenuOpen)

    if (isMenuOpen) {
      el.setAttribute('data-status', 'menuIsOpen')
      disableBodyScroll(refs.menu)
      closeEnquiryPanel()
      closeOverlayPanel()
    } else {
      el.removeAttribute('data-status')
      enableBodyScroll(refs.menu)
      closeEnquiryPanel()
      closeOverlayPanel()
    }
    disableScroll()
  }

  function onBreakpointChange () {
    if (!isDesktopMediaQuery.matches) {
      setScrollPaddingTop()
    }
  }

  function setScrollPaddingTop () {
    const scrollPaddingTop = document.getElementById('wpadminbar')
      ? navigationHeight + document.getElementById('wpadminbar').offsetHeight
      : navigationHeight
    document.documentElement.style.scrollPaddingTop = `${scrollPaddingTop}px`
  }

  return () => {
    isDesktopMediaQuery.removeEventListener('change', onBreakpointChange)
    el.removeEventListener('click', menuButtonClickDelegate)
  }

  function isVisible (el) {
    return el && window.getComputedStyle(el).display !== 'none'
  }
}
