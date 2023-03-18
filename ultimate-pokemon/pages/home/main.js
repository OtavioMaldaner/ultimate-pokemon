// Script that will show or hide the dropdown menu;
const userImageButton = document.querySelector(".user-area>img");
const dropdown = document.querySelector(".dropdown");


document.querySelector('.language-dropdown').click();

const languagesButton = document.querySelector(".languages-area>img");
const languagesDropdown = document.querySelector(".language-dropdown");


userImageButton.addEventListener("click", (evt) => {
    languagesDropdown.style.display = "none";
    if (dropdown.style.display === "none") {
        dropdown.style.display = "flex";
    } else {
        dropdown.style.display = "none";
    }
    
});


languagesButton.addEventListener("click", (evt) => {
    dropdown.style.display = "none";
    if (languagesDropdown.style.display === "none") {
        languagesDropdown.style.display = "flex";
    } else {
        languagesDropdown.style.display = "none";
    }
});
