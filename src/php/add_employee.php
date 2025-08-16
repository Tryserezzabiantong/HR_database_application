<?php
require_once '../config/config.php';
setCORSHeaders();
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Get database connection
$conn = getDatabaseConnection();

// Get the POST data
$data = json_decode(file_get_contents("php://input"));

// Check if data is not empty
if (!empty($data->Nomor_Pegawai) && !empty($data->nama)) {
    // Handle empty date values - convert empty strings to NULL for date fields
    $tanggalLahir = (!empty($data->Tanggal_Lahir)) ? $data->Tanggal_Lahir : null;
    $tglMasuk = (!empty($data->Tgl_Masuk)) ? $data->Tgl_Masuk : null;
    $tglKeluar = (!empty($data->Tgl_Keluar)) ? $data->Tgl_Keluar : null;
    
    // SQL query to insert new employee data
    $sql = "INSERT INTO data_pegawai (
        Nomor_Pegawai, nama, alamat, kota, telepon, Jenis_Kelamin, 
        Tempat_Lahir, Tanggal_Lahir, Golongan_Darah, Agama, Pendidikan, 
        Status_Perkawinan, No_KTP, NPWP, Tgl_Masuk, Tgl_Keluar, 
        DEPARTMENT, Jabatan
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement to prevent SQL injection
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bind_param("ssssssssssssssssss", 
        $data->Nomor_Pegawai, $data->nama, $data->alamat, $data->kota, 
        $data->telepon, $data->Jenis_Kelamin, $data->Tempat_Lahir, 
        $tanggalLahir, $data->Golongan_Darah, $data->Agama, 
        $data->Pendidikan, $data->Status_Perkawinan, $data->No_KTP, 
        $data->NPWP, $tglMasuk, $tglKeluar, 
        $data->DEPARTMENT, $data->Jabatan
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Employee added successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to add employee: " . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    // Show error if data is incomplete
    echo json_encode(["success" => false, "message" => "Incomplete data. Please provide Nomor_Pegawai and nama."]);
}

// Close the connection
$conn->close();
?>