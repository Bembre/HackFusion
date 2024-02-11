const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

//validaton code
document.addEventListener('DOMContentLoaded', function () {
    const signUpForm = document.querySelector('.sign-up form');
    const emailInput = signUpForm.querySelector('input[type="email"]');

    signUpForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        const email = emailInput.value.trim();

        // Check if the email matches the desired pattern
        if (isValidEmail(email)) {
            // Proceed with form submission
            signUpForm.submit();
        } else {
            // Show an error message or handle invalid email input
            alert('Please ,Register by college email ID "');
        }
    });

    // Function to validate email format
    function isValidEmail(email) {
        const pattern = /^S.*@mgmcen\.ac\.in$/;
        return pattern.test(email);
    }
});