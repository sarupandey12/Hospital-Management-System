<?php
require_once __DIR__ . '/../models/Admin.php';
require_once __DIR__ . '/../config/db.php';

session_start();

// Define slugify function outside any blocks so it's always available
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

$adminModel = new Admin($pdo);

// Registration handler
if (isset($_POST['register'])) {

    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password === $confirm) {
        $base_slug = slugify($full_name);
        $username = $base_slug;

        // Check if slug exists and append number
        $count = 1;
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin WHERE username = ?");
        while (true) {
            $stmt->execute([$username]);
            if ($stmt->fetchColumn() == 0)
                break;
            $username = $base_slug . '-' . $count++;
        }

        $success = $adminModel->register($full_name, $username, $email, $password);
        if ($success) {
            header("Location: ../admin/index.php");
            exit;
        } else {
            echo "Registration failed. Try again.";
        }
    } else {
        echo "Passwords do not match.";
    }
}

// Login handler (moved outside the registration block)
// if (isset($_POST['login'])) {
//     $usernameOrEmail = $_POST['username'];
//     $password = $_POST['password'];

//     $admin = $adminModel->login($usernameOrEmail, $password);
//     if ($admin) {
//         $_SESSION['admin_id'] = $admin['id'];
//         $_SESSION['admin_name'] = $admin['full_name'];
//         header("Location: ../views/dashboard.php");
//         exit;
//     } else {
//         echo "Invalid credentials.";
//     }
// }


// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    // var_dump($_POST);
    $usernameOrEmail = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $admin = $adminModel->login($usernameOrEmail, $password);

    if ($admin) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['full_name'];
        header("Location: ../admin/dashboard.php");
        exit;
    } else {
        // Show a message or redirect back with error
        echo "<script>alert('Invalid credentials.'); window.history.back();</script>";
    }
}


// Handle logout
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'logout') {
        $adminModel->logout();
    }
}

?>