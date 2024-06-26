// Setup links in menu to mark the currently shown page link
const configureNav = () => {
    const links = document.querySelectorAll('#main-nav menu a');
    const pageURL = window.location.href;
    
    // Check if link == pageURL, with or without trailing /s
    links.forEach(link => { 
        if (link.href == pageURL || link.href == pageURL.replace(/\/+$/, '')) {
            link.ariaCurrent = 'page';
        }
    });

    /**
     * Add event listeners to toggle the 'show' class on the main
     * nav menu. CSS handles the actual show/hide of the menu.
     */

    // Key elements of the nav system
    const openButton  = document.getElementById('menu-open');
    const mainNav     = document.getElementById('main-nav');
    const menuList    = document.getElementById('menu-links');
    // The actual links withon the menu
    const menuLinks   = menuList.querySelectorAll('a');

    // Setup button to open the menu
    openButton.addEventListener('click', () => {
        mainNav.classList.add('show');
    });

    // Setup links in menu to close the menu
    menuLinks.forEach(link => {
        link.addEventListener('click', () => {
            mainNav.classList.remove('show');
        });
    });

    // Clicking anywhere outside of the menu will also close it
    document.addEventListener('click', event => {
        // Don't close if we're clicking the open button or menu itself
        if (event.target != menuList && event.target != openButton) {
            mainNav.classList.remove('show');
        }
    });

    
}





