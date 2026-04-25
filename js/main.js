document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const primaryMenu = document.querySelector('.primary-menu');
    
    if (menuBtn && primaryMenu) {
        menuBtn.addEventListener('click', function() {
            primaryMenu.classList.toggle('show');
        });
    }
    
    // Ticker pause on hover
    const ticker = document.querySelector('.ticker ul');
    if (ticker) {
        ticker.addEventListener('mouseenter', function() {
            this.style.animationPlayState = 'paused';
        });
        ticker.addEventListener('mouseleave', function() {
            this.style.animationPlayState = 'running';
        });
    }
    
    // Dark Mode Toggle
    const darkToggle = document.getElementById('dark-mode-toggle');
    if (darkToggle) {
        if (localStorage.getItem('darkMode') === 'enabled') {
            document.body.classList.add('dark-mode');
            darkToggle.innerHTML = '<i class="fas fa-sun"></i>';
        }
        darkToggle.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
                darkToggle.innerHTML = '<i class="fas fa-sun"></i>';
            } else {
                localStorage.setItem('darkMode', 'disabled');
                darkToggle.innerHTML = '<i class="fas fa-moon"></i>';
            }
        });
    }
    
    // Search Modal
    const searchToggle = document.getElementById('search-toggle');
    const searchModal = document.getElementById('search-modal');
    const closeBtns = document.querySelectorAll('.modal-close');
    
    if (searchToggle && searchModal) {
        searchToggle.addEventListener('click', () => {
            searchModal.classList.add('active');
            setTimeout(() => {
                const input = searchModal.querySelector('.search-field');
                if (input) input.focus();
            }, 100);
        });
    }
    
    // User Modal
    const userToggle = document.getElementById('user-toggle');
    const userModal = document.getElementById('user-modal');
    
    if (userToggle && userModal) {
        userToggle.addEventListener('click', () => {
            userModal.classList.add('active');
        });
    }
    
    // Close modals
    closeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            if (searchModal) searchModal.classList.remove('active');
            if (userModal) userModal.classList.remove('active');
        });
    });
    
    // Click outside modal to close
    window.addEventListener('click', (e) => {
        if (e.target === searchModal) searchModal.classList.remove('active');
        if (e.target === userModal) userModal.classList.remove('active');
    });
    
    // Notification Bell Panel
    const notifIcon = document.getElementById('notification-icon');
    const notifPanel = document.getElementById('notification-panel');
    if (notifIcon && notifPanel) {
        notifIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            notifPanel.classList.toggle('active');
        });
        // Close panel when clicking outside
        document.addEventListener('click', (e) => {
            if (!notifPanel.contains(e.target) && e.target !== notifIcon) {
                notifPanel.classList.remove('active');
            }
        });
    }
    
    // Mark all read functionality
    const markAllBtn = document.querySelector('.mark-all-read');
    if (markAllBtn) {
        markAllBtn.addEventListener('click', () => {
            const badge = document.querySelector('.notification-badge');
            if (badge) badge.style.display = 'none';
            // Optional: clear list or mark as read via AJAX
            alert('All notifications marked as read (demo)');
        });
    }
    
    // Optional: Add Home link if missing in primary menu
    if (primaryMenu && !primaryMenu.querySelector('.home-link')) {
        const homeLi = document.createElement('li');
        homeLi.className = 'home-link';
        homeLi.innerHTML = '<a href="' + window.location.origin + '">Home</a>';
        primaryMenu.prepend(homeLi);
    }
});                darkToggle.innerHTML = '<i class="fas fa-sun"></i>';
            } else {
                localStorage.setItem('darkMode', 'disabled');
                darkToggle.innerHTML = '<i class="fas fa-moon"></i>';
            }
        });
    }
    
    // Search Modal
    const searchToggle = document.getElementById('search-toggle');
    const searchModal = document.getElementById('search-modal');
    const closeBtns = document.querySelectorAll('.modal-close');
    
    if (searchToggle && searchModal) {
        searchToggle.addEventListener('click', () => {
            searchModal.classList.add('active');
            searchModal.querySelector('.search-field').focus();
        });
    }
    
    // User Modal
    const userToggle = document.getElementById('user-toggle');
    const userModal = document.getElementById('user-modal');
    
    if (userToggle && userModal) {
        userToggle.addEventListener('click', () => {
            userModal.classList.add('active');
        });
    }
    
    // Close modals
    closeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            searchModal?.classList.remove('active');
            userModal?.classList.remove('active');
        });
    });
    
    // Click outside modal to close
    window.addEventListener('click', (e) => {
        if (e.target === searchModal) searchModal.classList.remove('active');
        if (e.target === userModal) userModal.classList.remove('active');
    });
    
    // Add Home button explicitly in menu if missing (optional: ensure home link exists)
    const primaryMenu = document.querySelector('.primary-menu');
    if (primaryMenu && !primaryMenu.querySelector('.home-link')) {
        const homeLi = document.createElement('li');
        homeLi.className = 'home-link';
        homeLi.innerHTML = '<a href="' + window.location.origin + '">Home</a>';
        primaryMenu.prepend(homeLi);
    }
}
