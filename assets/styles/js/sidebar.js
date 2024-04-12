const navLinks = document.querySelectorAll('.side a');
const windowPathname = window.location.pathname;

navLinks.forEach(link => {
    const navLinkPathname = new URL(link.href).pathname; 
    if (windowPathname === navLinkPathname) {
        link.classList.add('active'); 
    }
});