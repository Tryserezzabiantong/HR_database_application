<?php
/**
 * Application Status Check
 * This file provides information about the application status and health
 */

require_once 'config.php';

// Set CORS headers
setCORSHeaders();

// Initialize status array
$status = [
    'application' => [
        'name' => APP_NAME,
        'version' => APP_VERSION,
        'timestamp' => date('Y-m-d H:i:s'),
        'timezone' => date_default_timezone_get()
    ],
    'server' => [
        'php_version' => PHP_VERSION,
        'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
        'request_method' => $_SERVER['REQUEST_METHOD'] ?? 'Unknown'
    ],
    'database' => [
        'status' => 'unknown',
        'connection' => false,
        'tables' => [],
        'record_count' => 0
    ],
    'files' => [
        'config_exists' => file_exists('config.php'),
        'logs_writable' => is_writable('logs/'),
        'required_files' => []
    ],
    'errors' => []
];

// Check required files
$requiredFiles = [
    'index.html',
    'fetch_employees.php',
    'add_employee.php',
    'update_employee.php',
    'delete_employee.php'
];

foreach ($requiredFiles as $file) {
    $status['files']['required_files'][$file] = file_exists($file);
}

// Check database connection
try {
    $conn = getDatabaseConnection();
    if ($conn) {
        $status['database']['status'] = 'connected';
        $status['database']['connection'] = true;
        
        // Check if table exists
        $result = $conn->query("SHOW TABLES LIKE 'data_pegawai'");
        if ($result && $result->num_rows > 0) {
            $status['database']['tables'][] = 'data_pegawai';
            
            // Get record count
            $countResult = $conn->query("SELECT COUNT(*) as total FROM data_pegawai");
            if ($countResult) {
                $row = $countResult->fetch_assoc();
                $status['database']['record_count'] = $row['total'];
            }
        }
        
        $conn->close();
    } else {
        $status['database']['status'] = 'failed';
        $status['errors'][] = 'Database connection failed';
    }
} catch (Exception $e) {
    $status['database']['status'] = 'error';
    $status['errors'][] = 'Database error: ' . $e->getMessage();
}

// Check if logs directory is writable
if (!is_dir('logs/')) {
    $status['files']['logs_writable'] = false;
    $status['errors'][] = 'Logs directory does not exist';
} elseif (!is_writable('logs/')) {
    $status['files']['logs_writable'] = false;
    $status['errors'][] = 'Logs directory is not writable';
}

// Check for recent PHP errors
$phpErrorLog = '/Applications/XAMPP/xamppfiles/logs/php_error_log';
if (file_exists($phpErrorLog)) {
    $recentErrors = [];
    $lines = file($phpErrorLog);
    $recentLines = array_slice($lines, -5); // Last 5 lines
    
    foreach ($recentLines as $line) {
        if (strpos($line, 'employee_app') !== false) {
            $recentErrors[] = trim($line);
        }
    }
    
    if (!empty($recentErrors)) {
        $status['errors'][] = 'Recent PHP errors found in log';
        $status['recent_errors'] = $recentErrors;
    }
}

// Set HTTP response code
if (!empty($status['errors'])) {
    http_response_code(500);
    $status['overall_status'] = 'error';
} else {
    $status['overall_status'] = 'healthy';
}

// Output status as JSON
echo json_encode($status, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
