import Splide from '@splidejs/splide'
import '@splidejs/splide/css' // Import Splide styles

const teamSelect = document.querySelector('#team-select')
const matchContainer = document.querySelector('#match-container')
const apiBase = 'https://api.squadi.com/livescores/round/matches'

// Initialise with the first team
if (teamSelect.options.length > 0) {
  const firstTeamOption = teamSelect.options[0]
  console.log(firstTeamOption)
  firstTeamOption.selected = true // Select the first team by default
  const firstTeamParams = JSON.parse(firstTeamOption.dataset.params)
  console.log(firstTeamOption)
  console.log(firstTeamParams)

  // Fetch and render matches for the first team
  fetchAndRenderMatches(firstTeamParams)
}
// Function to fetch and render matches
async function fetchAndRenderMatches (teamParams) {
  'test'
  // Clear the match container
  matchContainer.innerHTML = '<p>Loading matches...</p>'

  // Build the correct URL structure
  const url = `${apiBase}?competitionId=${teamParams.competitionId}&divisionId=${teamParams.divisionId}&teamIds=[${teamParams.teamIds.join(',')}]&ignoreStatuses=[${teamParams.ignoreStatuses.join(',')}]`

  try {
    const response = await fetch(url)
    const data = await response.json()

    if (data.rounds && data.rounds.length > 0) {
      matchContainer.innerHTML = renderRounds(data.rounds)

      // Initialize Splide slider
      const matchSlider = new Splide('.match-slider', {
        type: 'loop',
        drag: 'free',
        focus: 'first',
        pagination: false,
        perPage: 6,
        breakpoints: {
          768: {
            perPage: 6
          }
        }
      })

      matchSlider.mount()
    } else {
      matchContainer.innerHTML = '<p>No matches found for this team.</p>'
    }
  } catch (error) {
    matchContainer.innerHTML = '<p>Error fetching match data. Please try again later.</p>'
    console.error('Error fetching matches:', error)
  }
}

// Event listener for team selection
teamSelect.addEventListener('change', async (event) => {
  const selectedTeam = event.target.value

  if (!selectedTeam) {
    matchContainer.innerHTML = '<p>Please select a team to view matches.</p>'
    return
  }

  // Fetch team parameters from data attribute
  const teamParams = JSON.parse(event.target.selectedOptions[0].dataset.params)

  // Fetch and render matches
  fetchAndRenderMatches(teamParams)
})

// Initialise with the first team
if (teamSelect.options.length > 0) {
  const firstTeamOption = teamSelect.options[0]
  firstTeamOption.selected = true // Select the first team by default
  const firstTeamParams = JSON.parse(firstTeamOption.dataset.params)

  // Fetch and render matches for the first team
  fetchAndRenderMatches(firstTeamParams)
}

// Function to render rounds and matches
function renderRounds (rounds) {
  return `
  <div class="splide match-slider">
    <div class="splide__track">
      <ul class="splide__list">
        ${rounds
          .map((round) =>
            round.matches
              .map(
                (match) => `
                  <li class="splide__slide">
                    <div class="match-card">
                      <div class="match-header">
                        <div class="match-date">${new Date(match.startTime).toLocaleString()}</div>
                        <div class="match-round">${round.name}</div>
                      </div>
                      <div class="team-wrap">
                        <div class="team-row">
                          <div class="team-logo">
                            <img src="${match.team1.logoUrl}" alt="${match.team1.name}" />
                          </div>
                          <div class="team-name">${match.team1.name}</div>
                          <div class="team-score">${match.team1Score}</div>
                        </div>
                        <div class="team-row">
                          <div class="team-logo">
                            <img src="${match.team2.logoUrl}" alt="${match.team2.name}" />
                          </div>
                          <div class="team-name">${match.team2.name}</div>
                          <div class="team-score">${match.team2Score}</div>
                        </div>
                      </div>
                    </div>
                  </li>
                `
              )
              .join('')
          )
          .join('')}
      </ul>
    </div>
  </div>
`
}
