function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'block';
        const overlay = modal.querySelector('.overlay');
        if (overlay) {
            overlay.style.display = 'block';
        }
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
        const overlay = modal.querySelector('.overlay');
        if (overlay) {
            overlay.style.display = 'none';
        }
    }
}

window.onclick = function(event) {
    const loginModal = document.getElementById('loginModal');
    const registerModal = document.getElementById('registerModal');

    if (event.target.classList.contains('modal-overlay')) {
        if (loginModal && event.target === loginModal.querySelector('.overlay')) {
            closeModal('loginModal');
        }
        if (registerModal && event.target === registerModal.querySelector('.overlay')) {
            closeModal('registerModal');
        }
    }
}

document.querySelector('#loginModal form').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (!email || !password) {
        alert('Email and password cannot be empty.');
        event.preventDefault();
    }
});

document.querySelector('#registerModal form').addEventListener('submit', function(event) {
    const email = document.getElementById('registerEmail').value;
    const password = document.getElementById('registerPassword').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    if (!email || !password || !confirmPassword) {
        alert('Email, password, and confirm password cannot be empty.');
        event.preventDefault();
        return;
    }

    if (password !== confirmPassword) {
        alert('Password and confirm password do not match.');
        event.preventDefault();
        return;
    }

    const passwordRegex = /^(?=.*[A-Z]).{6,12}$/;
    if (!passwordRegex.test(password)) {
        alert('Password must be 6-12 characters long and contain at least one uppercase letter.');
        event.preventDefault();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const isLoggedIn = document.body.getAttribute('data-logged-in') === 'true';
    if (isLoggedIn) {
        const registerForm = document.querySelector('#registerModal form');
        if (registerForm) {
            registerForm.addEventListener('submit', function(event) {
                alert('You are already logged in. You cannot register again.');
                event.preventDefault();
            });
        }
    }
});
