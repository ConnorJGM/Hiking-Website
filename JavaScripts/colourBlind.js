document.addEventListener("DOMContentLoaded", function () {
    const toggleColourBlind = () => {
        const isColourBlind = document.body.classList.toggle("colourBlindMode");
        localStorage.setItem("colourBlindMode", isColourBlind);

        const modeIcon = document.querySelector("#modeIcon");
        if (isColourBlind) {
            modeIcon.className = "fas fa-moon";
        } else {
            modeIcon.className = "fas fa-sun";
        }
    };

    // Load the colour-blind mode if it was previously set by the user.
    window.onload = () => {
        if (localStorage.getItem("colourBlindMode") === "true") {
            document.body.classList.add("colourBlindMode");
            document.querySelector("#modeIcon").className = "fas fa-moon";
        }
    };

    document
        .querySelector("#colourBlindToggle")
        .addEventListener("click", toggleColourBlind);
});
