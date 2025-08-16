<?php
require_once '../config/config.php';
setCORSHeaders();

$conn = getDatabaseConnection();

// SQL query to fetch all data from the data_pegawai table
$sql = "SELECT * FROM data_pegawai";
$result = $conn->query($sql);

$employees = array();

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch each row and add it to the array
    while($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the data in JSON format
echo json_encode($employees);
?>