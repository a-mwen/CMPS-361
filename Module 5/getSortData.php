<?php

$apiURL = "http://localhost:4021/api/teams";

// Fetch the data from the API
$response  = file_get_contents($apiURL);
// Decode JSON
$data = json_decode($response, true);

// Validate if data exists
if ($data && is_array($data)) {

    // Pagination setup
    $limit = 10; // Number of records per page
    $totalRecords = count($data);
    $totalPages = ceil($totalRecords / $limit); // Calculate the number of pages

    // Capture the current page or set default
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Ensure the current page is valid
    if ($currentPage < 1) {
        $currentPage = 1;
    } elseif ($currentPage > $totalPages) {
        $currentPage = $totalPages;
    }

    // Default sort column and order
    $sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'id'; // Default sort by 'id'
    $sortOrder = isset($_GET['order']) && $_GET['order'] == 'desc' ? 'desc' : 'asc'; // Default order is 'asc'

    // Sort the data based on column and order
    usort($data, function($a, $b) use ($sortColumn, $sortOrder) {
        // Compare numeric values for the 'id' column
        if ($sortColumn === 'id') {
            return $sortOrder === 'asc' ? $a[$sortColumn] - $b[$sortColumn] : $b[$sortColumn] - $a[$sortColumn];
        }
        // For string comparison
        return $sortOrder === 'asc' ? strcmp($a[$sortColumn], $b[$sortColumn]) : strcmp($b[$sortColumn], $a[$sortColumn]);
    });

    // Calculate the starting index for the current page
    $startIndex = ($currentPage - 1) * $limit;

    // Slice the data for the current page
    $pageData = array_slice($data, $startIndex, $limit);

    // Function to toggle sort order
    function toggleOrder($currentOrder) {
        return $currentOrder == 'asc' ? 'desc' : 'asc';
    }

    // Build the table
    echo "<table border='1' cellpadding='10'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th><a href='?page=$currentPage&sort=id&order=" . toggleOrder($sortOrder) . "'>ID</a></th>";
    echo "<th><a href='?page=$currentPage&sort=team&order=" . toggleOrder($sortOrder) . "'>Team</a></th>";
    echo "<th><a href='?page=$currentPage&sort=supervisor&order=" . toggleOrder($sortOrder) . "'>Supervisor</a></th>";
    echo "<th><a href='?page=$currentPage&sort=city&order=" . toggleOrder($sortOrder) . "'>City</a></th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Loop through the paginated data
    foreach ($pageData as $post) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($post['id']) . "</td>";
        echo "<td>" . htmlspecialchars($post['team']) . "</td>";
        echo "<td>" . htmlspecialchars($post['supervisor']) . "</td>";
        echo "<td>" . htmlspecialchars($post['city']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

    // Pagination navigation
    echo "<div style='margin-top: 20px;'>";

    // Previous page link
    if ($currentPage > 1) {
        echo '<a href="?page=' . ($currentPage - 1) . '&sort=' . $sortColumn . '&order=' . $sortOrder . '">Previous</a> ';
    }

    // Display page numbers
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            echo "<strong>$i</strong> ";
        } else {
            echo '<a href="?page=' . $i . '&sort=' . $sortColumn . '&order=' . $sortOrder . '">' . $i . '</a> ';
        }
    }

    // Next page link
    if ($currentPage < $totalPages) {
        echo '<a href="?page=' . ($currentPage + 1) . '&sort=' . $sortColumn . '&order=' . $sortOrder . '">Next</a>';
    }

    echo "</div>";

} else {
    echo "Sorry, no data is available. Please try again later.";
}

?>
