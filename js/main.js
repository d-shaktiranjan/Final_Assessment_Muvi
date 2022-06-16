let datalistOptions = document.getElementById("datalistOptions");

fetch("/final/api/getEmployeeName.php", {
    method: 'get',
})
    .then(response => response.json())
    .then(data => {
        for (let i in data) {
            console.log(data[i]);
            datalistOptions.innerHTML += `<option data-value="${i}">${data[i]}</option>`;
        }
    })
    .catch((error) => {
    });