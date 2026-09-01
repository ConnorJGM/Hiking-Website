document.addEventListener("DOMContentLoaded", function () {
    var mobileMenu = document.querySelector(".mobileMenu");
    var menu = document.querySelector(".navBar ul");

    if (mobileMenu) {
        mobileMenu.addEventListener("click", function () {
            var isMenuOpen = menu.style.display === "block";
            menu.style.display = isMenuOpen ? "none" : "block";
            mobileMenu.setAttribute("aria-expanded", !isMenuOpen);
            mobileMenu.classList.toggle("active", !isMenuOpen);
        });

        document.addEventListener("click", function (event) {
            var target = event.target;
            var isClickInsideMenu =
                menu.contains(target) || mobileMenu.contains(target);

            if (!isClickInsideMenu && menu.style.display === "block") {
                menu.style.display = "none";
                mobileMenu.setAttribute("aria-expanded", false);
                mobileMenu.classList.remove("active");
            }
        });
    }
});
