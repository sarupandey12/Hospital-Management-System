<?php
require_once __DIR__ . '/../config/db.php';

class Doctor
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertDoctor($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO doctors (
            name, email, phone, gender, dob, specialization, qualification, experience_years,
            available_days, available_time_from, available_time_to, profile_image, status
        ) VALUES (
            :name, :email, :phone, :gender, :dob, :specialization, :qualification, :experience_years,
            :available_days, :available_time_from, :available_time_to, :profile_image, :status
        )");

        return $stmt->execute([
            ':name' => $data['name'],
            ':email' => $data['email'],
            ':phone' => $data['phone'],
            ':gender' => $data['gender'],
            ':dob' => $data['dob'],
            ':specialization' => $data['specialization'],
            ':qualification' => $data['qualification'],
            ':experience_years' => $data['experience_years'],
            ':available_days' => $data['available_days'],
            ':available_time_from' => $data['available_time_from'],
            ':available_time_to' => $data['available_time_to'],
            ':profile_image' => $data['profile_image'],
            ':status' => $data['status']
        ]);
    }

    public function getAllDoctors()
    {
        $stmt = $this->pdo->query("SELECT * FROM doctors ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteDoctor($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM doctors WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function countDoctors()
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) AS total_doctors FROM doctors");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_doctors'];
    }



}
