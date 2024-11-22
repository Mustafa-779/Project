document.addEventListener("DOMContentLoaded", function () {
    const numItems = 6; // Number of listed items (You can dynamically change this)
    const paginationNav = document.getElementById("paginationNav");

    if (numItems > 6) {
        paginationNav.style.display = "block";
    }

    if (numItems > 12) {
        // Add more page buttons dynamically based on the total number of items
        const totalPages = Math.ceil(numItems / 4); // Assuming 4 items per page
        for (let i = 0; i < totalPages; i++) {
            const pageButton = document.createElement("li");
            pageButton.classList.add("page-item");
            pageButton.innerHTML = `<button class="page-link">${i + 1}</button>`;
            paginationNav
                .querySelector("ul")
                .insertBefore(pageButton, paginationNav.querySelector("ul").lastElementChild);
        }
    }
});

function clearForm() {
    document.getElementById("newItem").reset();
    document.getElementById("imagePreview").src = "insertImage.png";
}

const fileUpload = document.getElementById("fileUpload");
const imagePreview = document.getElementById("imagePreview");

fileUpload.addEventListener("change", function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            imagePreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
