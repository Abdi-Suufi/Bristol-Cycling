// Use JavaScript to fetch data and populate the table
fetch('/getdata') // Replace this URL with the appropriate endpoint
.then(response => response.json())
.then(data => {
    const table = document.getElementById('data-table');
    const tbody = table.querySelector('tbody');
    
    data.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.name}</td>
            <td>${item.description}</td>
        `;
        tbody.appendChild(row);
    });
});