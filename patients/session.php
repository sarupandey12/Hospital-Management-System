<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['patient_id'])) {
    // Dynamically find the path back to admin login page
    $scriptPath = $_SERVER['SCRIPT_NAME'];
    
    // Find where '/admin/' appears in the path
    $adminPos = strpos($scriptPath, '/patients/');

    // Get the base path from the start up to /admin/
    $basePath = substr($scriptPath, 0, $adminPos + strlen('/patients'));

    // Redirect to admin/index.php
    header("Location: $basePath/index.php");
    exit();
}

?>
