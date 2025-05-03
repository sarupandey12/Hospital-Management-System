<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/db.php';

class Patient
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function register($dataValues)
    {
        // Validate priority value exists in priority_levels table
        if (isset($dataValues['priority'])) {
            $priorityCheck = $this->pdo->prepare("SELECT priority_id FROM priority_levels WHERE priority_id = ?");
            $priorityCheck->execute([$dataValues['priority']]);
            if (!$priorityCheck->fetch()) {
                // Priority doesn't exist, set to NULL or default value
                $dataValues['priority'] = null; // or a default valid priority_id
            }
        }

        $hashedPassword = password_hash($dataValues['password'], PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare(
            "INSERT INTO patients 
            (full_name, email, password, phone, gender, date_of_birth, address, blood_group, medical_history, priority, symptoms, is_emergency, registration_date, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        $registrationDate = date('Y-m-d'); // Current date

        return $stmt->execute([
            $dataValues['full_name'],
            $dataValues['email'],
            $hashedPassword,
            $dataValues['phone'],
            $dataValues['gender'],
            $dataValues['date_of_birth'],
            $dataValues['address'],
            $dataValues['blood_group'],
            $dataValues['medical_history'],
            $dataValues['priority'],
            $dataValues['symptoms'],
            $dataValues['is_emergency'],
            $registrationDate,
            $dataValues['status'],
        ]);
    }
    public function login($usernameOrEmail, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE  email = ?");
        $stmt->execute([$usernameOrEmail]);
        $patient = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($patient && password_verify($password, $patient['password_hash'])) {
            // Update last_login
            $update = $this->pdo->prepare("UPDATE admin SET last_login = NOW() WHERE id = ?");
            $update->execute([$patient['id']]);
            return $patient;
        }
        return false;
    }
    public function countPatients()
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) AS total_patients FROM patients");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_patients'];
    }

    public function logout()
    {

        session_start();

        // Only unset patient-related session variables
        unset($_SESSION['patient_id']);
        unset($_SESSION['patient_name']);

        // Redirect to login page
        header("Location: ../index.php");
        exit();
    }

}
?>