<?php
/**
 * Employee Management System - Main Entry Point
 */

// Set headers
header('Content-Type: text/html; charset=utf-8');

// Include the main application
$app_file = 'src/html/index.html';

if (file_exists($app_file)) {
    // Read and output the HTML file
    $html_content = file_get_contents($app_file);
    echo $html_content;
} else {
    // Show error if file not found
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Employee Management System</title>
        <style>
            body { font-family: Arial, sans-serif; margin: 50px; text-align: center; }
            .error { color: #e74c3c; background: #fdf2f2; padding: 20px; border-radius: 8px; }
            .success { color: #27ae60; background: #f0f9ff; padding: 20px; border-radius: 8px; }
        </style>
    </head>
    <body>
        <h1>🏢 Employee Management System</h1>
        <div class="error">
            <h2>⚠️ Application Not Found</h2>
            <p>The main application file could not be found.</p>
            <p>Please check the installation or contact support.</p>
        </div>
        <div class="success">
            <h3>📁 Available Files:</h3>
            <ul style="list-style: none; padding: 0;">
                <li><a href="src/html/index.html">📱 Main Application</a></li>
                <li><a href="src/html/test_app.html">🧪 Test Interface</a></li>
                <li><a href="src/php/status.php">📊 System Status</a></li>
                <li><a href="README.md">📚 Documentation</a></li>
            </ul>
        </div>
    </body>
    </html>';
}
?>
