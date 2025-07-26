<?php

// define('BASE_URL', dirname($_SERVER['SCRIPT_NAME'], 1));  // For browser links
// define('BASE_PATH', dirname(__DIR__));                    // For include/require
?>

<?php
// Get full base URL like http://localhost/Hospital-Management-System
// $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
// $host = $_SERVER['HTTP_HOST'];
// $projectFolder = "/Hospital-Management-System"; // <-- change if folder name is different

// define('BASE_URL', $protocol . '://' . $host . $projectFolder); // For <a href>
// define('BASE_PATH', __DIR__ . '/../'); // For include() — filesystem path


// Get protocol (http or https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";

// Get host (e.g. localhost or domain)
$host = $_SERVER['HTTP_HOST'];

// Get current script path
$scriptDir = dirname($_SERVER['SCRIPT_NAME']);

// Remove sub-paths if you want only the root folder
$projectFolder = explode('/', trim($scriptDir, '/'))[0]; // first folder
$baseFolder = '/' . $projectFolder;

// Build base URL
define('BASE_URL', $protocol . '://' . $host . $baseFolder);

// File system base path
define('BASE_PATH', realpath(__DIR__ . '/../')); // file includes



?>
