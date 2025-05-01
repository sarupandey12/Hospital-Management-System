<?php
require_once __DIR__ . '/../models/Doctor.php';
require_once __DIR__ . '/../config/db.php';

session_start();

$doctor = new Doctor($pdo);           // Initialize Doctor with PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {

        // Prepare form data
        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'phone' => trim($_POST['phone'] ?? ''),
            'gender' => $_POST['gender'],
            'dob' => $_POST['dob'] ?? null,
            'specialization' => trim($_POST['specialization']),
            'qualification' => trim($_POST['qualification']),
            'experience_years' => $_POST['experience_years'] ?? null,
            'available_days' => isset($_POST['available_days']) ? implode(',', $_POST['available_days']) : null,
            'available_time_from' => $_POST['available_time_from'] ?? null,
            'available_time_to' => $_POST['available_time_to'] ?? null,
            'status' => $_POST['status'] ?? 'active',
            'profile_image' => null
        ];

        // Handle file upload
        if (!empty($_FILES['profile_image']['name'])) {
            $upload_dir = '../public/uploads/doctors/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
            $filename = uniqid('doctor_', true) . '.' . $ext;
            $target_path = $upload_dir . $filename;

            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_path)) {
                $data['profile_image'] = $filename;
            } else {
                throw new Exception("Failed to upload image.");
            }
        }

        $success = $doctor->insertDoctor($data);
        if ($success) {
            header("Location: ../admin/doctors/doctors.php?created=true");
            exit();
        } else {
            echo "Failed to insert doctor.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}



if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $doctor->deleteDoctor($id);
    header("Location: ../admin/doctors/doctors.php?deleted=true");
    exit();
}


?>