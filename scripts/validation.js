var fullNameError = document.getElementById("full-name-error");
var emailError = document.getElementById("register-email-error");
var passwordError = document.getElementById("register-password-error");
var numberError = document.getElementById("register-number-error");
var locationError = document.getElementById("location-error");
var birthdayError = document.getElementById("register-birthday-error");
var genderError = document.getElementById("register-gender-error");
var invalidSignUp = document.getElementById("invalid-sign-up");
var signUpButton = document.getElementById("signup-button");

function validateName() {
    var firstName = document.getElementById("register-firstname").value;
    var lastName = document.getElementById("register-lastname").value;

    if (firstName.length === 0 || lastName.length === 0) {
        fullNameError.innerHTML = 'Full name is required.';
        fullNameError.style.color = '#ff8787';
        invalidSignUp.innerHTML = "";
        return false;
    } else if (/[0-9!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(firstName) || /[0-9!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(lastName)) {
        fullNameError.innerHTML = 'Invalid name.';
        fullNameError.style.color = '#ff8787';
        invalidSignUp.innerHTML = "";
        return false;
    } else {
        fullNameError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
        fullNameError.style.color = '#87ff87';
        invalidSignUp.innerHTML = "";
        return true;
    }
}

function validateEmail() {
    var email = document.getElementById("register-email").value;

    if (email.length === 0) {
        emailError.innerHTML = 'Email is required.';
        emailError.style.color = '#ff8787';
        return false;
    }
    else if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(email)) {
        emailError.innerHTML = 'Invalid email address.';
        emailError.style.color = '#ff8787';
        return false;
    } else {
        emailError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
        emailError.style.color = '#87ff87';
        return true;
    }
}

function validateNumber() {
    var phoneNumber = document.getElementById("register-number").value;

    if (phoneNumber.length !== 11 || !/^\d{11}$/.test(phoneNumber) || /[a-zA-Z]/.test(phoneNumber)) {
        numberError.innerHTML = 'Phone number must have exactly 11 numeric digits.';
        numberError.style.color = '#ff8787';
        return false;
    } else {
        numberError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
        numberError.style.color = '#87ff87';
        return true;
    }
}

function validatePassword() {
    var password = document.getElementById("register-password").value;

    if (password.length < 8) {
        passwordError.innerHTML = 'Password must be at least 8 characters long.';
        passwordError.style.color = '#ff8787';
        return false;
    } else if (!/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/\d/.test(password) || !/[^A-Za-z0-9]/.test(password)) {
        passwordError.innerHTML = 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.';
        passwordError.style.color = '#ff8787';
        return false;
    } else {
        passwordError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
        passwordError.style.color = '#87ff87';
        return true;
    }
}

function validateLocation() {
    var region = document.getElementById("register-region").value;
    var city = document.getElementById("register-city").value;

    if (region.length === 0 || city.length === 0) {
        locationError.innerHTML = 'Location is required.';
        locationError.style.color = '#ff8787';
        invalidSignUp.innerHTML = "";
        return false;
    } else {
        locationError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
        locationError.style.color = '#87ff87';
        invalidSignUp.innerHTML = "";
        return true;
    }
}

function validateBirthday() {
    var birthdate = document.getElementById("register-birthday");
    var birthday = new Date(birthdate.value);
    var currentDate = new Date();

    if (isNaN(birthday)) {
        birthdayError.innerHTML = 'Invalid date.';
        birthdayError.style.color = '#ff8787';
    } else {
        var age = currentDate.getFullYear() - birthday.getFullYear();

        if (age < 18) {
            birthdayError.innerHTML = 'You must be at least 18 years old.';
            birthdayError.style.color = '#ff8787';
            return false;
        } else {
            birthdayError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
            birthdayError.style.color = '#87ff87';
            return true;
        }
    }
}

function validateGender() {
    var maleRadio = document.getElementById("male");
    var femaleRadio = document.getElementById("female");

    if (maleRadio.checked || femaleRadio.checked) {
        genderError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
        genderError.style.color = '#87ff87';
        return true;
    } else {
        genderError.innerHTML = 'Please select your gender.';
        genderError.style.color = '#ff8787';
        return false;
    }
}

function validateLoginForm() {
    var email = document.getElementById("login-email").value;
    var password = document.getElementById("login-password").value;
    var emailError = document.getElementById("login-email-error");
    var passwordError = document.getElementById("login-password-error");
    var successfulRegister = document.getElementById("successful-register");
    var invalidSignIn = document.getElementById("invalid-sign-in");

    // Email validation
    if (email.trim() === "") {
        invalidSignIn.innerHTML = "";
        successfulRegister.innerHTML = "";
        emailError.innerHTML = "Email is required.";
        return false;
    } 
    
    else {
        invalidSignIn.innerHTML = "";
        successfulRegister.innerHTML = "";
        emailError.innerHTML = "";
    }

    if (password.trim() === "") {
        invalidSignIn.innerHTML = "";
        successfulRegister.innerHTML = "";
        passwordError.innerHTML = "Password is required.";
        return false;
    } 
    
    else {
        invalidSignIn.innerHTML = "";
        successfulRegister.innerHTML = "";
        passwordError.innerHTML = "";
    }

    return true;
}