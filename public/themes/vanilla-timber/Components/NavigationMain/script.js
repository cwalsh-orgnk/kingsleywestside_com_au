export default function (el) {
  const isDesktopMediaQuery = window.matchMedia('(min-width: 1024px)')
  isDesktopMediaQuery.addEventListener('change', onBreakpointChange)
  const desktopNav = document.querySelectorAll('.header')
  const windowElem = window

  onBreakpointChange()

  function onBreakpointChange () {
    if (isDesktopMediaQuery.matches) {
      setScrollPaddingTop()
    }
  }

  function setScrollPaddingTop () {
    const wpadminbar = document.getElementById('wpadminbar')
    const scrollPaddingTop = wpadminbar ? wpadminbar.offsetHeight : 0
    document.documentElement.style.scrollPaddingTop = `${scrollPaddingTop}px`
  }

  function openDesktopSubMenu (menuItem) {
    const subMenu = menuItem.querySelector('ul.submenu')
    const subMenuWidth = subMenu.offsetWidth
    const elemLeftPos = menuItem.getBoundingClientRect().left
    const windowRightPos = windowElem.innerWidth - (subMenuWidth + 50)

    if (elemLeftPos > windowRightPos) {
      subMenu.classList.add('align-right')
    } else {
      subMenu.classList.remove('align-right')
    }

    menuItem.classList.add('sub-menu-open')
  }

  function closeDesktopSubMenu (menuItem) {
    menuItem.classList.remove('sub-menu-open')
  }

  desktopNav.forEach(nav => {
    nav.querySelectorAll('li.menu-item-has-children').forEach(menuItem => {
      menuItem.addEventListener('mouseenter', function () {
        setTimeout(() => {
          openDesktopSubMenu(menuItem)
        }, 10)
      })

      menuItem.addEventListener('mouseleave', function () {
        closeDesktopSubMenu(menuItem)
      })

      menuItem.querySelectorAll('a').forEach(anchor => {
        anchor.addEventListener('focus', function () {
          openDesktopSubMenu(menuItem)
        })

        anchor.addEventListener('blur', function () {
          setTimeout(() => {
            if (!menuItem.querySelector(':focus')) {
              closeDesktopSubMenu(menuItem)
            }
          }, 10)
        })
      })
    })
  })
}
let lastScrollTop = 0
const delta = 20
window.addEventListener('scroll', function () {
  const header = document.querySelector(
    'flynt-component[name="NavigationMain"]'
  )
  if (header) {
    const nowScrollTop = window.scrollY

    if (Math.abs(lastScrollTop - nowScrollTop) >= delta) {
      if (nowScrollTop > lastScrollTop) {
        header.classList.add('scrolled')
      } else {
        header.classList.remove('scrolled')
      }
      lastScrollTop = nowScrollTop
    }
  }
})
