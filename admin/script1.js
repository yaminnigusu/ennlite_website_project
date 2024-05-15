function signup() {
    var username = document.getElementById('signupUsername').value;
    var email = document.getElementById('signupEmail').value;
    var password = document.getElementById('signupPassword').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var usernameError = document.getElementById('usernameError');
    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');
    var successMessage = document.getElementById('successMessage');

    // Reset Error Messages
    usernameError.innerText = '';
    emailError.innerText = '';
    passwordError.innerText = '';
    successMessage.innerText = '';

    // Validate Username
    if (!isValidUsername(username)) {
        usernameError.innerText = "Username must contain only letters (a-z or A-Z).";
        return false; // Prevent form submission
    }

    // Validate Email
    if (!isValidEmail(email)) {
        emailError.innerText = "Enter a valid Email address ending with @gmail.com or @yahoo.com";
        return false; // Prevent form submission
    }

    // Validate Password
    if (!isValidPassword(password)) {
        passwordError.innerText = "Password must be at least 6 characters long and contain at least one capital letter, one number, and one special character.";
        return false; // Prevent form submission
    }

    // Validate Confirm Password
    if (password !== confirmPassword) {
        passwordError.innerText = "Passwords do not match.";
        return false; // Prevent form submission
    }

    // If validation passes, allow form submission
    return true;
}

function isValidUsername(username) {
    var regex = /^[a-zA-Z]+$/;
    return regex.test(username);
}

function isValidEmail(email) {
    var re = /^[a-zA-Z0-9._%+-]+@(gmail\.com|yahoo\.com)$/;
    return re.test(email);
}

function isValidPassword(password) {
    var hasCapitalLetter = /[A-Z]/.test(password);
    var hasNumber = /\d/.test(password);
    var hasSpecialCharacter = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password);
    return password.length >= 6 && hasCapitalLetter && hasNumber && hasSpecialCharacter;
}
