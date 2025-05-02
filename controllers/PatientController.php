<?php
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../config/db.php';

session_start();

$patientModal = new Patient($pdo);

// First handle login if login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $patient = $patientModal->login($email, $password);

    if ($patient) {
        $_SESSION['patient_id'] = $patient['id'];
        $_SESSION['patient_name'] = $patient['full_name'];
        header("Location: ../patients/dashboard.php");
        exit;
    } else {
        header("Location: ../patients/login.php?error=Invalid credentials.");
        exit;
    }
}

// Then handle registration if register form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    // Collect form data and sanitize
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $date_of_birth = $_POST['date_of_birth'];
    $address = $_POST['address'];
    $blood_group = $_POST['blood_group'];
    $medical_history = $_POST['medical_history'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    $priority=$_POST['priority_id'];
    $emergency=$_POST['is_emergency'];

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
            'date_of_birth' => $date_of_birth,
            'address' => $address,
            'blood_group' => $blood_group,
            'medical_history' => $medical_history,
            'password' => $password,  // Pass password for hashing inside model
            'priority_id'=>$priority,
            'is_emergency'=>$emergency,
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