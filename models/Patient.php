<?php
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
        $hashedPassword = password_hash($dataValues['password'], PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare(
            "INSERT INTO patients 
            (full_name, email, password, phone, gender, date_of_birth, address, blood_group, medical_history, registration_date, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
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

}
?>