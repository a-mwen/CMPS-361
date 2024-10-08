function searchTable() {
    let input = document.getElementById('searchInput').value.toLowerCase();
    let supervisorFilter = document.getElementById('supervisorFilter').value.toLowerCase();
    let cityFilter = document.getElementById('cityFilter').value.toLowerCase();
    
    // Clear existing rows
    let tableBody = document.getElementById('tableBody');
    tableBody.innerHTML = '';

    // Filter the full dataset based on the search input and filters
    const filteredData = fullData.filter(item => {
        let matchesSearch = true;
        let matchesSupervisor = true;
        let matchesCity = true;

        if (input) {
            matchesSearch = Object.values(item).some(value => 
                value.toString().toLowerCase().includes(input)
            );
        }

        if (supervisorFilter) {
            matchesSupervisor = item.supervisor.toLowerCase() === supervisorFilter;
        }

        if (cityFilter) {
            matchesCity = item.city.toLowerCase().includes(cityFilter);
        }

        return matchesSearch && matchesSupervisor && matchesCity;
    });

    // Repopulate the table with filtered data
    filteredData.forEach(post => {
        let row = `<tr>
            <td>${htmlspecialchars(post.id)}</td>
            <td>${htmlspecialchars(post.team)}</td>
            <td>${htmlspecialchars(post.supervisor)}</td>
            <td>${htmlspecialchars(post.city)}</td>
        </tr>`;
        tableBody.innerHTML += row;
    });
}

function filterTable() {
    searchTable();
}

function clearFilters() {
    document.getElementById('searchInput').value = "";
    document.getElementById('supervisorFilter').value = "";
    document.getElementById('cityFilter').value = "";
    searchTable();
}

// Optional: A helper function for HTML escaping if needed
function htmlspecialchars(string) {
    const element = document.createElement('div');
    element.innerText = string;
    return element.innerHTML;
}
