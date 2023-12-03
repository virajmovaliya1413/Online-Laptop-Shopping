const form = document.getElementById("form");
const lastname = document.getElementById("lastname");
const firstname = document.getElementById("firstname");
const email = document.getElementById("email");
const password = document.getElementById("password");
const password2 = document.getElementById("confirmPassword");

form.addEventListener("submit", e => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    //Get the value the form field.
    const lastnameValue = lastname.value.trim(); //trim to delete blanc space.
    const firstnameValue = firstname.value.trim(); //trim to delete blanc space.
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();

    if (lastnameValue === "") {
        setErrorInput(lastname, "Lastname is missing.");
    } else {
        setSuccessInput(lastname);
    }

    if (firstnameValue === "") {
        setErrorInput(firstname, "Firstname is missing.");
    } else {
        setSuccessInput(firstname);
    }

    //###################################
    if (emailValue === "") {
        setErrorInput(email, "Email is missing.");
    } else {
        validateEmail(emailValue) && setSuccessInput(email);
    }

    //###################################
    if (passwordValue === "") {
        setErrorInput(password, "Password connot be blank.");
    } else {
        setSuccessInput(password) && validatePassword(passwordValue);
    }

    //###################################
    if (password2Value === "") {
        setErrorInput(password2, "Password connot be blank.");
    } else if (password2Value !== passwordValue) {
        setErrorInput(password2, "Password dose not match.");
    } else {
        setSuccessInput(password2);
    }
}

function setErrorInput(input, errorMessage) {
    const formControl = input.parentElement;
    const small = formControl.querySelector("small");

    small.innerText = errorMessage;
    formControl.className = "form__control error";
}

function setSuccessInput(input) {
    const formControl = input.parentElement;
    formControl.className = "form__control success";
}

function validateEmail(email) {
    let regular_expressions = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regular_expressions.test(String(email).toLocaleLowerCase());
}

function validatePassword(password) {
    let regular_expressions = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
    return regular_expressions.match(regular_expressions);
}



function checkForm() {
    validateName();
    validateSurname();
    carSelect();
    validateDOB();

    if (errMessage == "") {
    } else {
        alert(errMessage);
    }
}



