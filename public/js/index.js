let tabs = document.querySelectorAll(".Content__scraperForm--tabs-tab");
let bodies = document.querySelectorAll(".Content__scraperForm--bodies-body")

function clearTabsActive() {
    tabs.forEach((tab)=>{
        tab.classList.remove("activeTab")
    })
}

function clearBodiesActive() {
    bodies.forEach((body)=>{
        body.classList.remove("activeBody")
    })
}

tabs.forEach((tab)=>{
    tab.addEventListener("click", ()=>{
        clearTabsActive();
        clearBodiesActive();
        tab.classList.add("activeTab");
        let selectedBody = tab.getAttribute("tab");
        let body = document.querySelector(`.${selectedBody}`)
        body.classList.add("activeBody")
    })
})

$(document).ready(function () {
    // Get references to the input elements
    const typeSelect = $('#type');
    const searchInput = $('#search');
    const categoriesSelect = $('#categories');
    const linksTextarea = $('#links');

    // Initially disable all input elements
    searchInput.prop('disabled', true);
    categoriesSelect.prop('disabled', true);
    linksTextarea.prop('disabled', true);

    // Add an event listener to the type select element
    typeSelect.on('change', function () {
        const selectedType = $(this).val();

        // Disable all input elements first
        searchInput.prop('disabled', true);
        categoriesSelect.prop('disabled', true);
        linksTextarea.prop('disabled', true);

        // Enable the specific input element based on the selected type
        if (selectedType === 'search') {
            searchInput.prop('disabled', false);
        } else if (selectedType === 'categories') {
            categoriesSelect.prop('disabled', false);
        } else if (selectedType === 'links') {
            linksTextarea.prop('disabled', false);
        }
    });
});