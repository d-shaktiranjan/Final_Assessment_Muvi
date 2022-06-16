let datalistOptions = document.getElementById("datalistOptions");

fetch("/final/api/getEmployeeName.php", {
    method: 'get',
})
    .then(response => response.json())
    .then(data => {
        for (let i in data) {
            datalistOptions.innerHTML += `<option value="${i}">${data[i]}</option>`;
        }
    })
    .catch((error) => {
    });