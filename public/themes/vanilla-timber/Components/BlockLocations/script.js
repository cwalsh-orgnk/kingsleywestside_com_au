const titles = document.querySelectorAll('.venues-tabs__title')
const maps = document.querySelectorAll('.venues-tabs__map')
const select = document.querySelector('.venues-tabs__select')

// Handle button clicks
titles.forEach((title) => {
  title.addEventListener('click', () => {
    const tabIndex = title.getAttribute('data-tab')

    // Hide all maps and remove active class from titles
    maps.forEach((map) => (map.style.display = 'none'))
    titles.forEach((t) => t.classList.remove('active'))

    // Show the selected map and highlight the title
    document.querySelector(`.venues-tabs__map[data-tab="${tabIndex}"]`).style.display = 'block'
    title.classList.add('active')
  })
})

// Handle dropdown change
if (select) {
  select.addEventListener('change', () => {
    const tabIndex = select.value

    // Hide all maps and remove active class from titles
    maps.forEach((map) => (map.style.display = 'none'))
    titles.forEach((t) => t.classList.remove('active'))

    // Show the selected map
    document.querySelector(`.venues-tabs__map[data-tab="${tabIndex}"]`).style.display = 'block'
    titles[tabIndex]?.classList.add('active') // Optionally highlight the corresponding title
  })
}

// Set the first tab as active by default
if (titles.length > 0 && maps.length > 0) {
  titles[0].classList.add('active')
  maps[0].style.display = 'block'
}
