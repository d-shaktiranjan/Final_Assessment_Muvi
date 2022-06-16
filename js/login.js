let password = document.getElementById("password");
let showPassword = document.getElementById("showPassword");
let checkBoxLabel = document.getElementById("checkBoxLabel");

showPassword.addEventListener("click", () => {
    if (showPassword.checked) {
        password.type = "text";
        checkBoxLabel.innerText = "Hide Password"
    }

    else {
        password.type = "password";
        checkBoxLabel.innerText = "Show Password";
    }

});