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

    // Calculate the starting index for the current page
    $startIndex = ($currentPage - 1) * $limit;

    // Slice the data for the current page
    $pageData = array_slice($data, $startIndex, $limit);

    // Build the table
    echo "<table border='1' cellpadding='10'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Team</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Loop through the paginated data
    foreach ($pageData as $post) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($post['id']) . "</td>";
        echo "<td>" . htmlspecialchars($post['team']) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";

    // Pagination navigation
    echo "<div style='margin-top: 20px;'>";

    // Previous page link
    if ($currentPage > 1) {
        $prevPage = $currentPage - 1;
        echo "<a href='?page=$prevPage'>Previous</a> ";
    }

    // Next page link
    if ($currentPage < $totalPages) {
        $nextPage = $currentPage + 1;
        echo "<a href='?page=$nextPage'>Next</a>";
    }

    echo "</div>";

} else {
    echo "Sorry, no data is available. Please try again later.";
}

?>
