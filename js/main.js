document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const mainNav = document.querySelector('.main-nav ul');
    
    if (menuBtn && mainNav) {
        menuBtn.addEventListener('click', function() {
            mainNav.classList.toggle('show');
        });
    }
    
    // Optional: Dynamic ticker pause on hover
    const ticker = document.querySelector('.ticker ul');
    if (ticker) {
        ticker.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        ticker.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    }
});
