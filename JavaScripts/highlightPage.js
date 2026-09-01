document.addEventListener("DOMContentLoaded", function () {
    var currentPath = window.location.pathname.split("/").pop(); // Get the current file name or path segment and store in variable.

    var menuItems = document.querySelectorAll(".navBar a, .headerFlex a"); // Select all nav links including those in headerFlex.

    menuItems.forEach(function (item) {
        if (item.getAttribute("href") === currentPath) {
            // Check the current "href" strictly equals "currentPath"
            item.classList.add("active"); // Add 'active' class to the <a> tag.

            // If there's an <i> element, add 'active' class to it as well
            var icon = item.querySelector("i");
            if (icon) {
                icon.classList.add("active");
            }
        }
    });
});
