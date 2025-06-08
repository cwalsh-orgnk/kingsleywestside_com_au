import{S as r}from"./splide.esm-DdfnUrLx.js";/* empty css                   */const i=document.querySelector("#team-select"),a=document.querySelector("#match-container"),c="https://api.squadi.com/livescores/round/matches";if(i.options.length>0){const e=i.options[0];console.log(e),e.selected=!0;const s=JSON.parse(e.dataset.params);console.log(e),console.log(s),n(s)}async function n(e){"test";a.innerHTML="<p>Loading matches...</p>";const s=`${c}?competitionId=${e.competitionId}&divisionId=${e.divisionId}&teamIds=[${e.teamIds.join(",")}]&ignoreStatuses=[${e.ignoreStatuses.join(",")}]`;try{const o=await(await fetch(s)).json();o.rounds&&o.rounds.length>0?(a.innerHTML=d(o.rounds),new r(".match-slider",{type:"loop",drag:"free",focus:"first",pagination:!1,perPage:6,breakpoints:{768:{perPage:6}}}).mount()):a.innerHTML="<p>No matches found for this team.</p>"}catch(t){a.innerHTML="<p>Error fetching match data. Please try again later.</p>",console.error("Error fetching matches:",t)}}i.addEventListener("change",async e=>{if(!e.target.value){a.innerHTML="<p>Please select a team to view matches.</p>";return}const t=JSON.parse(e.target.selectedOptions[0].dataset.params);n(t)});if(i.options.length>0){const e=i.options[0];e.selected=!0;const s=JSON.parse(e.dataset.params);n(s)}function d(e){return`
  <div class="splide match-slider">
    <div class="splide__track">
      <ul class="splide__list">
        ${e.map(s=>s.matches.map(t=>`
                  <li class="splide__slide">
                    <div class="match-card">
                      <div class="match-header">
                        <div class="match-date">${new Date(t.startTime).toLocaleString()}</div>
                        <div class="match-round">${s.name}</div>
                      </div>
                      <div class="team-wrap">
                        <div class="team-row">
                          <div class="team-logo">
                            <img src="${t.team1.logoUrl}" alt="${t.team1.name}" />
                          </div>
                          <div class="team-name">${t.team1.name}</div>
                          <div class="team-score">${t.team1Score}</div>
                        </div>
                        <div class="team-row">
                          <div class="team-logo">
                            <img src="${t.team2.logoUrl}" alt="${t.team2.name}" />
                          </div>
                          <div class="team-name">${t.team2.name}</div>
                          <div class="team-score">${t.team2Score}</div>
                        </div>
                      </div>
                    </div>
                  </li>
                `).join("")).join("")}
      </ul>
    </div>
  </div>
`}
