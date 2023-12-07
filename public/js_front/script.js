
function scrollToHeading(headingId) {
    const heading = document.getElementById(headingId);
    if (heading) {
        const header = document.querySelector('header');
        const headerHeight = header.offsetHeight;
        const headerRect = header.getBoundingClientRect();
        const headingRect = heading.getBoundingClientRect();

        const scrollOffset = headingRect.top - headerRect.bottom + window.scrollY;

        window.scrollTo({
            top: scrollOffset,
            behavior: 'smooth'
        });
    }
}
