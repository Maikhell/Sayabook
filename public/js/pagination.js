document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('#paginated-card');
    const paginationLinks = document.querySelectorAll('#card-pagination .page-link');

    const cardsPerPage = 20;
    let currentPage = 1;

    function displayPage(page) {

        const startIndex = (page - 1) * cardsPerPage;
        const endIndex = startIndex + cardsPerPage;

        cards.forEach((card, index) => {
            card.classList.add('d-none');

            if (index >= startIndex && index < endIndex) {
                card.classList.remove('d-none');
            }
        });
        document.querySelectorAll('#card-pagination .page-item').forEach(item => {
            item.classList.remove('active');
        });
        const activeLink = document.querySelector(`[data-page="${page}"]`).parentNode;
        if (activeLink) {
            activeLink.classList.add('active');
        }
    }
    paginationLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();

            const pageValue = e.target.getAttribute('data-page');
            const totalPages = Math.ceil(cards.length / cardsPerPage);

            if (pageValue === 'prev') {
                currentPage = Math.max(1, currentPage - 1);
            } else if (pageValue === 'next') {
                currentPage = Math.min(totalPages, currentPage + 1);
            } else {
                currentPage = parseInt(pageValue);
            }

            displayPage(currentPage);
        });
    });

    displayPage(currentPage);
});