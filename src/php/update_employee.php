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

// Check if data and the 'id' field are not empty
if (!empty($data->id) && !empty($data->Nomor_Pegawai) && !empty($data->nama)) {
    // Handle empty date values - convert empty strings to NULL for date fields
    $tanggalLahir = (!empty($data->Tanggal_Lahir)) ? $data->Tanggal_Lahir : null;
    $tglMasuk = (!empty($data->Tgl_Masuk)) ? $data->Tgl_Masuk : null;
    $tglKeluar = (!empty($data->Tgl_Keluar)) ? $data->Tgl_Keluar : null;
    
    // SQL query to update existing employee data
    $sql = "UPDATE data_pegawai SET
        Nomor_Pegawai = ?,
        nama = ?,
        alamat = ?,
        kota = ?,
        telepon = ?,
        Jenis_Kelamin = ?,
        Tempat_Lahir = ?,
        Tanggal_Lahir = ?,
        Golongan_Darah = ?,
        Agama = ?,
        Pendidikan = ?,
        Status_Perkawinan = ?,
        No_KTP = ?,
        NPWP = ?,
        Tgl_Masuk = ?,
        Tgl_Keluar = ?,
        DEPARTMENT = ?,
        Jabatan = ?
    WHERE id = ?";

    // Prepare the statement to prevent SQL injection
    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    // The 'i' stands for integer for the 'id' field, and 's' for string
    $stmt->bind_param("ssssssssssssssssssi", 
        $data->Nomor_Pegawai, $data->nama, $data->alamat, $data->kota, 
        $data->telepon, $data->Jenis_Kelamin, $data->Tempat_Lahir, 
        $tanggalLahir, $data->Golongan_Darah, $data->Agama, 
        $data->Pendidikan, $data->Status_Perkawinan, $data->No_KTP, 
        $data->NPWP, $tglMasuk, $tglKeluar, 
        $data->DEPARTMENT, $data->Jabatan, $data->id
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Employee updated successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to update employee: " . $stmt->error]);
    }

    // Close the statement
    $stmt->close();
} else {
    // Show error if data is incomplete
    echo json_encode(["success" => false, "message" => "Incomplete data. Please provide employee ID, Nomor_Pegawai, and nama."]);
}

// Close the connection
$conn->close();
?>