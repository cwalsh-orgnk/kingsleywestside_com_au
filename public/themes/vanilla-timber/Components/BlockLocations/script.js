const titles = document.querySelectorAll('.venues-tabs__title')
const maps = document.querySelectorAll('.venues-tabs__map')

titles.forEach((title) => {
  title.addEventListener('click', () => {
    const tabIndex = title.getAttribute('data-tab')

    // Hide all maps and remove active class from titles
    maps.forEach((map) => map.style.display = 'none')
    titles.forEach((t) => t.classList.remove('active'))

    // Show the selected map and highlight the title
    document.querySelector(`.venues-tabs__map[data-tab="${tabIndex}"]`).style.display = 'block'
    title.classList.add('active')
  })
})

// Set the first tab as active by default
if (titles.length > 0) {
  titles[0].classList.add('active')
  maps[0].style.display = 'block'
}
