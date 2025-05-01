<?php
namespace Models;

use Enums\Specialization;
use PDO;
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

    public function updateDoctor($data, $id)
    {
        $stmt = $this->pdo->prepare("UPDATE doctors SET
        name = :name, 
        email = :email, 
        phone = :phone, 
        gender = :gender, 
        dob = :dob, 
        specialization = :specialization, 
        qualification = :qualification, 
        experience_years = :experience_years,
        available_days = :available_days,
        available_time_from = :available_time_from,
        available_time_to = :available_time_to,
        profile_image = :profile_image, 
        status = :status
        WHERE id = :id");

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
            ':status' => $data['status'],
            ':id' => $id
        ]);
    }

    public function getAllDoctors()
    {
        $stmt = $this->pdo->query("SELECT * FROM doctors ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getDoctorById($id)
    {
        // Prepare the SQL query to fetch the doctor by ID
        $stmt = $this->pdo->prepare("SELECT * FROM doctors WHERE id = :id LIMIT 1");

        // Execute the query with the ID parameter
        $stmt->execute([':id' => $id]);

        // Fetch the result
        $doctor = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the doctor exists, return the data
        if ($doctor) {
            return $doctor;
        } else {
            return null; // No doctor found with the given ID
        }
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


    public function addDoctorSpecializations($doctorId, array $specializations)
    {
        foreach ($specializations as $specialization) {
            // Assuming Specialization is an enum
            $specializationEnum = Specialization::from($specialization);

            // Insert into the doctor_specializations table
            $stmt = $this->pdo->prepare("INSERT INTO doctor_specializations (doctor_id, specialization_id) 
                                SELECT :doctor_id, id FROM specializations WHERE name = :specialization");
            $stmt->bindParam(':doctor_id', $doctorId);
            $stmt->bindParam(':specialization', $specializationEnum->value);
            $stmt->execute();
        }
    }
    public function getDoctorSpecializations($doctorId)
    {
        $stmt = $this->pdo->prepare("SELECT s.name FROM specializations s 
                           JOIN doctor_specializations ds ON s.id = ds.specialization_id 
                           WHERE ds.doctor_id = :doctor_id");
        $stmt->bindParam(':doctor_id', $doctorId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function updateDoctorSpecializations($doctorId, array $newSpecializations)
    {
        // First, delete existing specializations for the doctor
        $stmt = $this->pdo->prepare("DELETE FROM doctor_specializations WHERE doctor_id = :doctor_id");
        $stmt->bindParam(':doctor_id', $doctorId);
        $stmt->execute();

        // Now, add the new specializations
        $this->addDoctorSpecializations($doctorId, $newSpecializations);
    }



}
