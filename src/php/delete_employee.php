<?php
require_once '../config/config.php';
setCORSHeaders();
header("Access-Control-Allow-Methods: POST, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Get database connection
$conn = getDatabaseConnection();

// Get the POST data
$data = json_decode(file_get_contents("php://input"));

// Check if the 'id' field is not empty
if (!empty($data->id)) {
    // SQL query to delete employee data
    $sql = "DELETE FROM data_pegawai WHERE id = ?";

    // Prepare the statement to prevent SQL injection
    $stmt = $conn->prepare($sql);

    // Bind the 'id' parameter to the statement
    // The 'i' stands for integer
    $stmt->bind_param("i", $data->id);

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Employee deleted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to delete employee: " . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    // Show error if 'id' is not provided
    echo json_encode(["success" => false, "message" => "Incomplete data. Please provide employee ID."]);
}

// Close the connection
$conn->close();
?>
