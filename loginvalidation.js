const form = document.getElementById("form");
const email = document.getElementById("email");
const password = document.getElementById("password");

form.addEventListener("submit", e => {
    e.preventDefault();
    checkInputs();
});

function checkInputs() {
    //Get the value the form field.

    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();

    //###################################
    if (emailValue === "") {
        setErrorInput(email, "Invalid email ");
    } else {
        validateEmail(emailValue) && setSuccessInput(email);
    }

    //###################################
    if (passwordValue === "") {
        setErrorInput(password, "Password can not be blank.");
    } else {
        setSuccessInput(password) && validatePassword(passwordValue);
    }

    //###################################

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
    let regular_expressions = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
    return regular_expressions.match(regular_expressions);
}





