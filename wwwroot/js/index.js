document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll(".nav-link");

    const sections = document.querySelectorAll("section");

    function hideAllSections() {
        sections.forEach((section) => {
            section.classList.add("hidden");
        });
    }

    function showSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            section.classList.remove("hidden");
        }
    }

    navLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); 
            const targetSectionId = this.getAttribute("href").substring(1); 
            hideAllSections();
            showSection(targetSectionId); 
        });
    });
});