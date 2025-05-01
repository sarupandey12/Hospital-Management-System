<?php

use Models\Doctor;
require_once __DIR__ . '/../models/Doctor.php';
require_once __DIR__ . '/../config/db.php';

session_start();

$doctor = new Doctor($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insert_doctor'])) {
    $errors = [];

    // Validate required fields
    if (empty($_POST['name']))
        $errors['name'] = 'Name is required.';
    if (empty($_POST['email']))
        $errors['email'] = 'Email is required.';
    if (empty($_POST['gender']))
        $errors['gender'] = 'Gender is required.';
    if (empty($_POST['specializations']))
        $errors['specializations'] = 'At least one specialization is required.';

    if (empty($errors)) {
        try {
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone'] ?? ''),
                'gender' => $_POST['gender'],
                'dob' => $_POST['dob'] ?? null,
                'specialization' => implode(',', $_POST['specializations']), // multiple checkboxes
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
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST; // To repopulate form fields
        header("Location: ../admin/doctors/add_doctor.php"); // Change to your form page
        exit();


    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_doctor'])) {
    $errors = [];

    // Validate required fields
    if (empty($_POST['name']))
        $errors['name'] = 'Name is required.';
    if (empty($_POST['email']))
        $errors['email'] = 'Email is required.';
    if (empty($_POST['specializations']))
        $errors['specializations'] = 'At least one specialization is required.';

    if (empty($errors)) {
        try {
            $doctor_id = $_POST['doctor_id'];
            
            // First get the current doctor data to preserve existing image if needed
            $currentDoctor = $doctor->getDoctorById($doctor_id);
            
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone'] ?? ''),
                'gender' => $_POST['gender'],
                'dob' => $_POST['dob'] ?? null,
                'specialization' => implode(',', $_POST['specializations']),
                'qualification' => trim($_POST['qualification']),
                'experience_years' => $_POST['experience_years'] ?? null,
                'available_days' => isset($_POST['available_days']) ? implode(',', $_POST['available_days']) : null,
                'available_time_from' => $_POST['available_time_from'] ?? null,
                'available_time_to' => $_POST['available_time_to'] ?? null,
                'status' => $_POST['status'] ?? 'active',
                'profile_image' => $currentDoctor['profile_image'] // Default to existing image
            ];

            // Handle file upload only if a new image was selected
            if (!empty($_FILES['profile_image']['name'])) {
                $upload_dir = '../public/uploads/doctors/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // Delete old image if it exists
                if (!empty($currentDoctor['profile_image']) && file_exists($upload_dir . $currentDoctor['profile_image'])) {
                    unlink($upload_dir . $currentDoctor['profile_image']);
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

            $success = $doctor->updateDoctor($data, $doctor_id);
            if ($success) {
                header("Location: ../admin/doctors/doctors.php?updated=true");
                exit();
            } else {
                echo "Failed to update doctor.";
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        header("Location: ../admin/doctors/edit_doctor.php?id=" . $_POST['doctor_id']);
        exit();
    }
}


if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $doctor->deleteDoctor($id);
    header("Location: ../admin/doctors/doctors.php?deleted=true");
    exit();
}


?>