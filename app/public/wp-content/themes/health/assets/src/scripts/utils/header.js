const hamburger = document.querySelector('.header__hamburger');
const mobileMenu = document.querySelector('.modal-menu');
const body = document.querySelector('body');

if (hamburger) {
    hamburger.addEventListener('click', function () {
        body.classList.toggle('overflow-hidden');
        hamburger.classList.toggle('open');
        mobileMenu.classList.toggle('open');
    })

    window.addEventListener("resize", menuOpen);
    function menuOpen() {
        if (screen.width >= 991 ) {
            body.classList.remove('overflow-hidden');
            hamburger.classList.remove('open');
            mobileMenu.classList.remove('open');
        }
    }
}