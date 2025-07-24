<?php

use Models\Doctor;
ob_start(); // Start output buffer
session_start();

// Redirect if not logged in
if (!isset($_SESSION['patient_id'])) {
    header("Location: ../patient/index.php");
    exit();
}

require_once __DIR__ . '/../models/Appointment.php';
require_once __DIR__ . '/../models/Services.php';
require_once __DIR__ . '/../models/Doctor.php';

$appointmentModel = new Appointment($pdo);
$serviceModel = new Services($pdo);
$doctorModel = new Doctor($pdo);

$totalAppointments = $appointmentModel->getTotalAppointmentsByPatient($_SESSION['patient_id']);
$totalServices = $serviceModel->getTotalServices();
$totalDoctors = $doctorModel->countDoctors();


?>

<!-- Dashboard Content -->
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <!-- Quick Stats -->
    <!-- Dashboard Quick Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Total Appointments Card -->
        <div class="bg-white shadow rounded-lg p-6 flex items-center space-x-4">
            <div class="bg-blue-100 p-3 rounded-full">
                <!-- Calendar Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10m-10 4h10m-6 4h6" />
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-900"><?= $totalAppointments ?></h3>
                <p class="text-gray-500">Your Total Appointments</p>
            </div>
        </div>

        <!-- Total Services Card -->
        <div class="bg-white shadow rounded-lg p-6 flex items-center space-x-4">
            <div class="bg-green-100 p-3 rounded-full">
                <!-- Clipboard List Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m-2 4h2a2 2 0 002-2V6a2 2 0 00-2-2h-2m-4 0H7a2 2 0 00-2 2v12a2 2 0 002 2h2m0-4v4" />
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-900"><?= $totalServices ?></h3>
                <p class="text-gray-500">Total Services</p>
            </div>
        </div>

        <!-- Total Doctors Card -->
        <div class="bg-white shadow rounded-lg p-6 flex items-center space-x-4">
            <div class="bg-purple-100 p-3 rounded-full">
                <!-- User Group Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-2a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-900"><?= $totalDoctors ?></h3>
                <p class="text-gray-500">Total Doctors</p>
            </div>
        </div>

    </div>


</div>


<?php
$content = ob_get_clean(); // Store content in $content
include("partials/master.php"); // Inject into master layout
?>