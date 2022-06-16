let datalistOptions = document.getElementById("datalistOptions");

fetch("/final/api/getEmployeeName.php", {
    method: 'get',
})
    .then(response => response.json())
    .then(data => {
        data.forEach(element => {
            datalistOptions.innerHTML += `<option value="${element}">`;
        });
    })
    .catch((error) => {
    });