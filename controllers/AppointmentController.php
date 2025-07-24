<?php
require_once __DIR__ . '/../models/Appointment.php';
require_once __DIR__ . '/../config/db.php';

session_start();


// Assuming form POST data is already validated and sanitized:
$appointmentModel = new Appointment($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['priority_store'])) {
    // Sanitize and fetch inputs
    $patient_id = trim($_POST['patient_id'] ?? '');

    $date = trim($_POST['appointment_date'] ?? '');
    $service_id = trim($_POST['service_id'] ?? '');
    $priority_id = trim($_POST['priority_id'] ?? '');
    $reason = trim($_POST['reason'] ?? '');

    // Basic validation
    $errors = [];


    if ($date === '')
        $errors[] = 'Appointment date is required.';
    if ($service_id === '')
        $errors[] = 'Please select a service.';
    if ($patient_id === '')
        $errors[] = 'Please select a patient .';
    if ($priority_id === '')
        $errors[] = 'Please select a priority level.';

    // Additional validation: date not in past
    if ($date < date('Y-m-d')) {
        $errors[] = 'Appointment date cannot be in the past.';
    }

    if (!empty($errors)) {
        // Store errors in session and redirect back
        $_SESSION['form_errors'] = $errors;
        // header('Location: ' . $_SERVER['PHP_SELF']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    // Prepare data array for storing
    $appointmentData = [
        'patient_id' => $patient_id,
        'appointment_date' => $date,
        'service_id' => $service_id,
        'priority_id' => $priority_id,
        'reason' => $reason
    ];

    $success = $appointmentModel->storeAppointment($appointmentData);

    if ($success) {
        $_SESSION['appointmen_success'] = "Appointment sent successfully!";
        header('Location: ' . $_SERVER['HTTP_REFERER']); // Redirects to the previous page
        exit;
    } else {
        $_SESSION['appointmen_failed'] = "Appointment failed to send";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

?>