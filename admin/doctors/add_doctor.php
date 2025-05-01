<?php

use Models\Doctor;

require_once(__DIR__ . "/../../app/Enums/Specialization.php");
use Enums\Specialization;

ob_start(); // Start output buffer

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];


// Clear session errors after showing once
unset($_SESSION['errors'], $_SESSION['old']);
// print_r($_GET['did']);

// Check if we're in edit mode (doctor ID exists)
$isEditMode = isset($_GET) && !empty($_GET['did']);
$formAction = $isEditMode ? "update_doctor.php" : "add_doctor.php";

if ($isEditMode) {
    require_once '../../models/Doctor.php'; // Include the Doctor model

    $doctorModal = new Doctor($pdo);           // Initialize Doctor with PDO

    $doctor = $doctorModal->getDoctorById($_GET['did']);
    // print_r($doctors);
}

?>

<!-- Main Content -->
<main class="flex-1 bg-gray-50 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">

        <!-- Header Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 mb-6 p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-800">Create New Doctor</h1>
                <span class="bg-blue-50 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">Admin Portal</span>
            </div>
            <p class="text-gray-500 mt-1">Enter the doctor's details to create a new profile</p>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 transition-all duration-300 hover:shadow-md">
            <div class="p-6 sm:p-8">
                <form id="doctorForm" action="../../controllers/DoctorController.php" method="POST"
                    enctype="multipart/form-data">
                    <?php if($isEditMode):?>
                    <input type="hidden" name="doctor_id" value="<?= $_GET['did']?>">
                    <?php endif ?>
                    <!-- Form Header -->
                    <div class="border-b border-gray-100 pb-6 mb-6">
                        <div class="flex items-center space-x-3">
                            <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <h2 class="text-lg font-semibold text-gray-800">Personal Information</h2>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="space-y-8">
                        <!-- Personal Details Section -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Full Name -->
                            <div class="form-group">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span
                                        class="text-red-500">*</span></label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="name" name="name"
                                        value="<?= htmlspecialchars($isEditMode ? $doctor['name'] : ($_POST['name'] ?? '')) ?>"
                                        class="pl-10 block w-full rounded-md border <?= isset($errors['name']) ? 'border-red-500' : 'border-gray-200' ?> focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-20 transition duration-200 py-3">
                                </div>
                                <?php if (isset($errors['name'])): ?>
                                    <p class="text-red-500 text-sm mt-1"><?= $errors['name'] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span
                                        class="text-red-500">*</span></label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="email" id="email" name="email"
                                        value="<?= htmlspecialchars($isEditMode ? $doctor['email'] : ($_POST['email'] ?? '')) ?>"
                                        class="pl-10 block w-full rounded-md border <?= isset($errors['email']) ? 'border-red-500' : 'border-gray-200' ?> focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-20 transition duration-200 py-3">
                                </div>
                                <?php if (isset($errors['name'])): ?>
                                    <p class="text-red-500 text-sm mt-1"><?= $errors['email'] ?></p>
                                <?php endif; ?>
                            </div>

                            <!-- Phone -->
                            <div class="form-group">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone
                                    Number</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <input type="tel" id="phone" name="phone"
                                        value="<?= htmlspecialchars($isEditMode ? $doctor['phone'] : ($_POST['phone'] ?? '')) ?>"
                                        class="pl-10 block w-full rounded-md border<?= isset($errors['phone']) ? 'border-red-500' : 'border-gray-200' ?> focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-20 transition duration-200 py-3">
                                </div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="form-group">
                                <label for="dob" class="block text-sm font-medium text-gray-700 mb-1">Date of
                                    Birth</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <input type="date" id="dob" name="dob"
                                        value="<?= htmlspecialchars($isEditMode ? $doctor['dob'] : ($_POST['dob'] ?? '')) ?>"
                                        class="pl-10 block w-full rounded-md border  focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-20 transition duration-200 py-3">
                                </div>
                            </div>
                        </div>

                        <!-- Gender Selection -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-3">Gender</label>
                            <div class="flex flex-wrap gap-4">
                                <div class="flex items-center">
                                    <input type="radio" id="male" name="gender" value="male"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                        <?= ($isEditMode && $doctor['gender'] == 'male') || ($_POST['gender'] ?? '') == 'male' ? 'checked' : '' ?>>
                                    <label for="male" class="ml-2 text-sm text-gray-700">Male</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="female" name="gender" value="female"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                        <?= ($isEditMode && $doctor['gender'] == 'female') || ($_POST['gender'] ?? '') == 'female' ? 'checked' : '' ?>>
                                    <label for="female" class="ml-2 text-sm text-gray-700">Female</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="other" name="gender" value="other"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300"
                                        <?= ($isEditMode && $doctor['gender'] == 'other') || ($_POST['gender'] ?? '') == 'other' ? 'checked' : '' ?>>
                                    <label for="other" class="ml-2 text-sm text-gray-700">Other</label>
                                </div>
                            </div>
                        </div>


                        <!-- Professional Details Section -->
                        <div class="border-t border-gray-100 pt-6">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-semibold text-gray-800">Professional Information</h2>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Specialization -->
                                <div class="form-group md:col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Specialization <span class="text-red-500">*</span></label>
                                <div class="bg-white rounded-lg border border-gray-200 p-3 h-64 overflow-y-auto grid grid-cols-1 gap-2">
                                    <?php foreach (Specialization::cases() as $specialization): ?>
                                        <label class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-blue-50 transition-colors">
                                            <input type="checkbox" name="specializations[]"
                                                value="<?= $specialization->value ?>"
                                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 h-4 w-4"
                                                <?php 
                                                // Check if the specialization is selected
                                                $isChecked = isset($_POST['specializations']) && in_array($specialization->value, $_POST['specializations']);
                                                if ($isEditMode && in_array($specialization->value, explode(',', $doctor['specialization']))) {
                                                    $isChecked = true;
                                                }
                                                echo $isChecked ? 'checked' : '';
                                                ?>
                                            >
                                            <span class="text-sm text-gray-700"><?= $specialization->value ?></span>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                                <?php if (isset($errors['specializations'])): ?>
                                    <p class="text-red-500 text-sm mt-1"><?= $errors['specializations'] ?></p>
                                <?php endif; ?>
                            </div>


                                <div class="space-y-6">
                                    <!-- Qualification -->
                                    <div class="form-group">
                                        <label for="qualification"
                                            class="block text-sm font-medium text-gray-700 mb-1">Qualification <span
                                                class="text-red-500">*</span></label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                                    <path
                                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                </svg>
                                            </div>
                                            <input type="text" id="qualification" name="qualification"
                                                value="<?= htmlspecialchars($isEditMode ? $doctor['qualification'] : ($_POST['qualification'] ?? '')) ?>"
                                                class="pl-10 block w-full rounded-md border  focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-20 transition duration-200 py-3">
                                        </div>
                                    </div>

                                    <!-- Experience -->
                                    <div class="form-group">
                                        <label for="experience_years"
                                            class="block text-sm font-medium text-gray-700 mb-1">Experience
                                            (Years)</label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <input type="number" id="experience_years" name="experience_years" min="0"
                                                value="<?= htmlspecialchars($isEditMode ? $doctor['experience_years'] : ($_POST['experience_years'] ?? '')) ?>"
                                                class="pl-10 block w-full rounded-md border  focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-20 transition duration-200 py-3">
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="form-group">
                                        <label for="status"
                                            class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                        <div class="relative rounded-md shadow-sm">
                                            <div
                                                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <select id="status" name="status"
                                                class="pl-10 block w-full rounded-md border focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-20 transition duration-200 py-3">
                                                <option value="active" <?= ($isEditMode && $doctor['status'] == 'active') || ($_POST['status'] ?? '') == 'active' ? 'selected' : '' ?>>Active
                                                </option>
                                                <option value="inactive" <?= ($isEditMode && $doctor['status'] == 'inactive') || ($_POST['status'] ?? '') == 'inactive' ? 'selected' : '' ?>>Inactive</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Availability Section -->
                        <div class="border-t border-gray-100 pt-6">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h2 class="text-lg font-semibold text-gray-800">Availability</h2>
                            </div>

                            <!-- Available Days -->
                            <div class="bg-white rounded-lg border border-gray-200 p-4 mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-3">Available Days</label>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                                    <?php
                                    $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                    $colors = [
                                        'Monday' => 'blue',
                                        'Tuesday' => 'indigo',
                                        'Wednesday' => 'purple',
                                        'Thursday' => 'pink',
                                        'Friday' => 'red',
                                        'Saturday' => 'green',
                                        'Sunday' => 'yellow'
                                    ];

                                    foreach ($days as $day):
                                        $color = $colors[$day];
                                    ?>
                                        <label class="relative flex items-center justify-between p-3 rounded-lg border border-gray-200 hover:border-<?= $color ?>-300 hover:bg-<?= $color ?>-50 transition-colors cursor-pointer">
                                            <div class="flex items-center">
                                                <input type="checkbox" id="<?= strtolower($day) ?>" name="available_days[]"
                                                    value="<?= $day ?>"
                                                    class="h-4 w-4 text-<?= $color ?>-600 focus:ring-<?= $color ?>-500 border-gray-300 rounded"
                                                    <?php 
                                                    // Check if the day is selected
                                                    $isChecked = isset($_POST['available_days']) && in_array($day, $_POST['available_days']);
                                                    if ($isEditMode && isset($doctor['available_days']) && in_array($day, explode(',', $doctor['available_days']))) {
                                                        $isChecked = true;
                                                    }
                                                    echo $isChecked ? 'checked' : '';
                                                    ?>
                                                >
                                                <span class="ml-2 text-sm text-gray-700"><?= $day ?></span>
                                            </div>
                                            <span class="inline-flex h-2 w-2 rounded-full bg-<?= $color ?>-400"></span>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </div>


                            <!-- Available Time -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="form-group">
                                    <label for="available_time_from"
                                        class="block text-sm font-medium text-gray-700 mb-1">Available Time From</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <input type="time" id="available_time_from" name="available_time_from"  value="<?= htmlspecialchars($isEditMode ? $doctor['available_time_from'] : ($_POST['available_time_from'] ?? '')) ?>"
                                            class="pl-10 block w-full rounded-md border  focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-20 transition duration-200 py-3">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="available_time_to"
                                        class="block text-sm font-medium text-gray-700 mb-1">Available Time To</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <input type="time" id="available_time_to" name="available_time_to"  value="<?= htmlspecialchars($isEditMode ? $doctor['available_time_to'] : ($_POST['available_time_to'] ?? '')) ?>"
                                            class="pl-10 block w-full rounded-md border  focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-20 transition duration-200 py-3">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Image -->
<div class="border-t border-gray-100 pt-6">
    <div class="flex items-center space-x-3 mb-6">
        <div class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        <h2 class="text-lg font-semibold text-gray-800">Profile Image</h2>
    </div>

    <div class="form-group">
        <div class="flex items-center space-x-6">
            <div id="image-preview-container"
                class="h-24 w-24 rounded-full bg-gray-100 flex items-center justify-center border-2 border-dashed border-gray-300 overflow-hidden">
                <!-- Default icon - hidden if image exists -->
                <svg id="default-icon" xmlns="http://www.w3.org/2000/svg"
                    class="h-12 w-12 text-gray-400 <?= $isEditMode && !empty($doctor['profile_image']) ? 'hidden' : '' ?>"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <!-- Image preview - shown if image exists -->
                <?php if ($isEditMode && !empty($doctor['profile_image'])): ?>
                    <img id="image-preview" class="h-full w-full object-cover" 
                         src="../../public/uploads/doctors/<?= htmlspecialchars($doctor['profile_image']) ?>" 
                         alt="Profile preview" />
                <?php else: ?>
                    <img id="image-preview" class="hidden h-full w-full object-cover" 
                         src="#" alt="Profile preview" />
                <?php endif; ?>
            </div>
            <div class="flex-1">
                <label for="profile_image"
                    class="block text-sm font-medium text-gray-700 mb-2">Upload Profile
                    Image</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*"
                    class="block w-full text-sm text-gray-500 
                    file:mr-4 file:py-2 file:px-4 
                    file:rounded-md file:border-0 
                    file:text-sm file:font-medium 
                    file:bg-blue-50 file:text-blue-700 
                    hover:file:bg-blue-100">
                <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                
                <?php if ($isEditMode && !empty($doctor['profile_image'])): ?>
                    <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image</p>
                    <!-- Hidden field to preserve existing image if no new file is uploaded -->
                    <input type="hidden" name="existing_profile_image" value="<?= htmlspecialchars($doctor['profile_image']) ?>">
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>

                    </div>

                    <!-- Submit Button -->
                    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-end">
                        <div class="flex space-x-3">
                            <button type="button"
                                class="py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Cancel
                            </button>
                            <button type="submit" name="<?= $isEditMode ? 'update_doctor' : 'insert_doctor' ?>"
                                class="group relative py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                                <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-5 w-5 mr-2 group-hover:animate-pulse" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    <!-- Create Doctor -->
                                    <?= $isEditMode ? 'Update ' : 'Create' ?>
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


<!-- <script>
    document.getElementById('profile_image').addEventListener('change', function (e) {
        const file = e.target.files[0];
        const preview = document.getElementById('image-preview');
        const defaultIcon = document.getElementById('default-icon');
        const container = document.getElementById('image-preview-container');

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                defaultIcon.classList.add('hidden');
                container.classList.remove('border-dashed', 'border-gray-300');
                container.classList.add('border-solid', 'border-blue-300');
            }

            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.classList.add('hidden');
            defaultIcon.classList.remove('hidden');
            container.classList.add('border-dashed', 'border-gray-300');
            container.classList.remove('border-solid', 'border-blue-300');
        }
    });
</script> -->



<script>
document.getElementById('profile_image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('image-preview');
    const defaultIcon = document.getElementById('default-icon');
    
    if (file) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            defaultIcon.classList.add('hidden');
        }
        
        reader.readAsDataURL(file);
    }
});
</script>   

<?php
$content = ob_get_clean();
include("../partials/master.php"); // Inject into master layout
?>