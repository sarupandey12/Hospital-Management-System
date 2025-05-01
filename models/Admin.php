<?php
require_once __DIR__ . '/../config/db.php';

class Admin
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function register($full_name, $username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO admin (full_name, username, email, password_hash) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$full_name, $username, $email, $hashedPassword]);
    }

    public function login($usernameOrEmail, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE username = ? OR email = ?");
        $stmt->execute([$usernameOrEmail, $usernameOrEmail]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password_hash'])) {
            // Update last_login
            $update = $this->pdo->prepare("UPDATE admin SET last_login = NOW() WHERE id = ?");
            $update->execute([$admin['id']]);
            return $admin;
        }
        return false;
    }


    function logout()
    {
        session_start();

        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect to login page
        header("Location: ../index.php");
        exit();
    }

}
?>