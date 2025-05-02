<?php
// session_start();

// Redirect if not logged in
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: ../admin/index.php");
//     exit();
// }

// Get current page and folder
$current_page = basename($_SERVER['PHP_SELF']);
$current_folder = basename(dirname($_SERVER['PHP_SELF']));

// Base path to handle relative navigation
$base_path = ($current_folder === 'patients') ? '' : '../';

// Helper function for active class
function isActive($check, $type = 'page') {
    global $current_page, $current_folder;
    if ($type === 'page') {
        return $current_page === $check ? 'text-blue-600 border-blue-600' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300';
    }
    return $current_folder === $check ? 'bg-green-100 text-green-600' : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare - Patient Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <style>
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .transition-all {
            transition: all 0.3s ease;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }

        .accent-gradient-bg {
            background: linear-gradient(135deg, #8b5cf6 0%, #6366f1 100%);
        }

        .blur-bg {
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.8);
        }

        .appointment-card {
            border-left: 4px solid #3b82f6;
        }

        .notification-dot {
            top: 2px;
            right: 2px;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <!-- Top Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold text-blue-600">MediCare</span>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="hidden md:ml-6 md:flex md:space-x-8">
                        <a href="<?= $base_path ?>dashboard.php"
                            class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium <?php echo isActive('dashboard.php'); ?>">
                            Dashboard
                        </a>
                        <a href="<?= $base_path ?>appointments/book_appointment.php"
                            class="inline-flex items-center px-1 pt-1 border-b-2 text-s m font-medium <?= isActive('book_appointment.php'); 
                                // Also check if we're in appointments folder
                                echo ($current_folder === 'appointments') ? ' text-blue-600 border-blue-600' : '';
                            ?>">
                            Appointments
                        </a>
                        <!-- <a href="<?= $base_path ?>medical_records.php"
                            class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium <?php echo isActive('medical_records.php'); ?>">
                            Medical Records
                        </a> -->
                        <a href="<?= $base_path ?>services.php"
                            class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium <?php echo isActive('medical_records.php'); ?>">
                            Services
                        </a>
                        <a href="<?= $base_path ?>doctors/doctors.php"
                            class="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium <?php echo isActive('medical_records.php'); ?>">
                            Doctors
                        </a>
                    </div>
                    <div class="flex items-center ml-6">
                        <div class="relative">
                            <button type="button" class="p-1 text-gray-400 hover:text-gray-500 focus:outline-none">
                                <span class="sr-only">View notifications</span>
                                <div class="relative">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                    <span class="absolute notification-dot h-2 w-2 bg-red-500 rounded-full"></span>
                                </div>
                            </button>
                        </div>
                        <div class="ml-4 relative flex-shrink-0">
                            <div class="flex items-center">
                                <div class="mr-3 text-right hidden sm:block">
                                    <p class="text-sm font-medium text-gray-700"><?= $_SESSION['patient_name'] ?? 'Patient Name' ?></p>
                                    <p class="text-xs text-gray-500">Patient ID: P-2023486</p>
                                </div>
                                <button type="button"
                                    class="flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <img class="h-8 w-8 rounded-full object-cover border border-gray-200"
                                        src="/api/placeholder/150/150" alt="User profile">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow">
        <!-- Welcome Banner -->
        <div class="gradient-bg text-white">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="flex-1 min-w-0">
                        <h1 class="text-2xl font-bold leading-tight">
                            Welcome back, <?= $_SESSION['patient_name'] ?? 'Patient' ?>
                        </h1>
                        <p class="mt-1 text-sm text-blue-100">
                            <?php echo date('l, F j, Y'); ?>
                        </p>
                    </div>
                    <div class="mt-4 flex md:mt-0 md:ml-4">
                        <a href="<?= $base_path ?>appointments/book_appointment.php" type="button"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-blue-600 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Book Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>