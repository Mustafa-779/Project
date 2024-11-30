// Get all category links
const links = document.querySelectorAll('.icon-link');

// Retrieve the active link ID from localStorage
const activeLinkId = localStorage.getItem('activeLinkId');

// If an active link ID is stored, apply the active styles
if (activeLinkId) {
    const activeLink = document.getElementById(activeLinkId);
    if (activeLink) {
        activeLink.classList.add('text-primary', 'fw-bold');
        const activeParagraph = activeLink.querySelector('p');
        if (activeParagraph) {
            activeParagraph.classList.add('fw-bold');
        }
    }
}

// Add click event listener to each link
links.forEach(link => {
    link.addEventListener('click', function () {
        // Remove active styles from all links
        links.forEach(link => {
            link.classList.remove('text-primary', 'fw-bold');
            const paragraph = link.querySelector('p');
            if (paragraph) {
                paragraph.classList.remove('fw-bold');
            }
        });

        // Add active styles to the clicked link
        this.classList.add('text-primary', 'fw-bold');
        const clickedParagraph = this.querySelector('p');
        if (clickedParagraph) {
            clickedParagraph.classList.add('fw-bold');
        }

        // Store the active link's ID in localStorage
        localStorage.setItem('activeLinkId', this.id);
    });
});
