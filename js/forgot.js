let resetBtn = document.getElementById("resetBtn");
let email = document.getElementById("email");

email.addEventListener("keyup", () => {
    fetch(`api/checkUser.php?email=${email.value}`, {
        method: 'get',
    })
        .then(response => response.json())
        .then(data => {
            if (data != null) resetBtn.disabled = false;
            else resetBtn.disabled = true;
        })
        .catch((error) => {
            resetBtn.disabled = true;
        });
})