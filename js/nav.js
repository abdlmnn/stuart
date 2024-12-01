function toggleModal() {
    const modal = document.getElementById("modal");
    const hamburger = document.querySelector(".hamburger");

    // Toggle the modal visibility
    if (modal.style.display === "flex") {
        modal.style.display = "none"; // Close the modal
        hamburger.classList.remove("active"); // Remove active class from hamburger
    } else {
        modal.style.display = "flex"; // Open the modal
        hamburger.classList.add("active"); // Add active class to hamburger
    }
}