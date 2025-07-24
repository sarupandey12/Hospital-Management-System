<?php
require_once __DIR__ . '/../config/db.php';

class Patient
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllPatients()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM patients");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function getPatientDetail($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM patients WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ['error' => $e->getMessage()];
        }
    }



    public function register($dataValues)
    {
        $hashedPassword = password_hash($dataValues['password'], PASSWORD_BCRYPT);

        // Adjusted query with only columns you have values for
        $stmt = $this->pdo->prepare(
            "INSERT INTO patients 
        (full_name, email, password, phone, gender, address, blood_group) 
        VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        return $stmt->execute([
            $dataValues['full_name'],
            $dataValues['email'],
            $hashedPassword,
            $dataValues['phone'],
            $dataValues['gender'],
            $dataValues['address'],
            $dataValues['blood_group'],
        ]);
    }

    public function login($usernameOrEmail, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM patients WHERE email = ?");
        $stmt->execute([$usernameOrEmail]);

        $patient = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$patient) {
            // Email not found
            return [
                'success' => false,
                'message' => 'Email not found.'
            ];
        }

        if (!password_verify($password, $patient['password'])) {
            // Password doesn't match
            return [
                'success' => false,
                'message' => 'Password does not match.'
            ];
        }

        // Success: return patient
        return [
            'success' => true,
            'patient' => $patient
        ];
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
        // Just handle session cleanup
        unset($_SESSION['patient_id']);
        unset($_SESSION['patient_name']);
        session_unset();
        session_destroy();
    }


}
?>