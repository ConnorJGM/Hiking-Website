document.addEventListener("DOMContentLoaded", () => {
    const lastPage = parseInt(localStorage.getItem("currentPage"), 10);
    if (!Number.isNaN(lastPage)) {
        currentPage = lastPage;
    }

    document
        .querySelector("#prevPage")
        .setAttribute("aria-label", "Go to previous page.");
    document
        .querySelector("#nextPage")
        .setAttribute("aria-label", "Go to next page.");

    productPages();
});

let currentPage = 1;
const rowsPage = 3; // Maximum rows per page.

function productPages() {
    const rows = document.querySelectorAll(".productRow .product");
    const totalRows = rows.length;
    const totalPages = Math.ceil(totalRows / rowsPage);

    // Initially hide all rows.
    rows.forEach((row) => {
        row.style.display = "none";
    });

    // Calculate the range of rows to show.
    const startRow = (currentPage - 1) * rowsPage;
    const endRow = startRow + rowsPage;

    // Show the rows for the current page.
    rows.forEach((row, index) => {
        if (index >= startRow && index < endRow) {
            row.style.display = ""; // Show this row.
        }
    });

    // Update button visibility.
    document.querySelector("#prevPage").style.visibility =
        currentPage === 1 ? "hidden" : "visible";
    document.querySelector("#nextPage").style.visibility =
        currentPage === totalPages ? "hidden" : "visible";
}

function changePage(direction) {
    const totalRows = document.querySelectorAll(".productRow .product").length;
    const totalPages = Math.ceil(totalRows / rowsPage);

    currentPage += direction;
    currentPage = Math.max(1, Math.min(currentPage, totalPages)); // Ensure currentPage is within bounds.

    localStorage.setItem("currentPage", currentPage.toString());

    productPages();
}

window.onload = () => {
    if (localStorage.getItem("productPage") === "true") {
        document.body.classList.add("productPage");
    }
};

document
    .querySelector("#prevPage")
    .addEventListener("click", () => changePage(-1));
document
    .querySelector("#nextPage")
    .addEventListener("click", () => changePage(1));
