<?php
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../config/db.php';

session_start();

$patientModal = new Patient($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $result = $patientModal->login($email, $password);

    if ($result['success']) {
        $_SESSION['patient_id'] = $result['patient']['id'];
        $_SESSION['patient_name'] = $result['patient']['full_name'];
        header("Location: ../patients/dashboard.php");
        exit;
    } else {
        // Store error in session and redirect back
        $_SESSION['login_error'] = $result['message'];
        header("Location: ../patients/index.php");
        exit;
    }
}


// Handle patient logout request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['patient_logout'])) {
    $patientModal->logout();

    // Redirect *after* calling logout
    header("Location: ../patients/index.php");
    exit;
}


// Then handle registration if register form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Collect form data and sanitize
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $blood_group = $_POST['blood_group'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];


    if (empty($full_name) || empty($email) || empty($phone)) {
        header("Location: ../patients/register.php?error=Please fill in all required fields.");
        exit();
    }

    if ($password === $confirm) {
        $dataArray = [
            'full_name' => $full_name,
            'email' => $email,
            'phone' => $phone,
            'gender' => $gender,
            'address' => $address,
            'blood_group' => $blood_group,
            'password' => $password,  // Pass password for hashing inside model
        ];

        $success = $patientModal->register($dataArray);
        if ($success) {
            header("Location: ../patients/index.php?success=Registered successfully.");
            exit;
        } else {
            header("Location: ../patients/register.php?error=Registration failed. Try again.");
            exit;
        }
    } else {
        header("Location: ../patients/register.php?error=Passwords do not match.");
        exit();
    }
}

// If neither login nor register form is submitted
header("Location: ../patients/login.php");
exit();


function slugify($text)
{
    // Replace non-letter/digits with -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // Transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // Trim
    $text = trim($text, '-');
    // Remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // Lowercase
    return strtolower($text);
}

?>