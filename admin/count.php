<?php

use Models\Doctor;

require_once __DIR__ . '/../models/Doctor.php';
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../config/db.php';

$doctorModel = new Doctor($pdo);
$patientModel = new Patient($pdo);

// Get the counts
$totalDoctors = $doctorModel->countDoctors();
$totalPatients = $patientModel->countPatients();
// $totalAppointments = $doctorModel->countAppointments();
// echo $totalDoctors;

// Return the result as JSON
echo json_encode([
    'total_doctors' => $totalDoctors,
    'total_patients' => $totalPatients,
    // 'total_appointments' => $totalAppointments
]);
?>