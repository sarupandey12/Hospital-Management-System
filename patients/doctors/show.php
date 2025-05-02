<?php

use Models\Doctor;
require_once '../../models/Doctor.php'; // Include the Doctor model
$id = $_GET['id'];

$doctorModal = new Doctor($pdo);           // Initialize Doctor with PDO

$doctor = $doctorModal->getDoctorById($id);
?>
<!-- Doctor View Modal -->
<div id="doctorViewModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog"
    aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-55 transition-opacity" aria-hidden="true"></div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <!-- Modal panel -->
        <div
            class="inline-block align-bottom bg-white rounded-xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl sm:w-full">
            <!-- Close button -->
            <div class="absolute top-0 right-0 pt-4 pr-4">
                <button type="button"
                    class="close-modal bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Header with profile image -->
            <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-4 py-5 sm:px-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-16 w-16 rounded-full bg-white p-1">
                        <img id="modal-profile-image" class="h-full w-full rounded-full object-cover"
                            src="<?= !empty($doctor['profile_image']) ? '../../public/uploads/doctors/' . $doctor['profile_image'] : '/path/to/default-avatar.png' ?>"
                            alt="<?= htmlspecialchars($doctor['name']) ?>">
                    </div>
                    <div class="ml-4 text-white">
                        <h3 class="text-lg leading-6 font-medium" id="modal-name">
                            <?= htmlspecialchars($doctor['name']) ?>
                        </h3>
                        <p class="text-sm" id="modal-qualification"><?= htmlspecialchars($doctor['qualification']) ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-4">
                <!-- Status Badge -->
                <div class="flex justify-between items-center mb-6">
                    <div class="text-sm text-gray-500" id="modal-id"> <?= 'ID: DOC-' . str_pad($doctor['id'], 3, '0', STR_PAD_LEFT) ?>
                    </div>
                    <span id="modal-status"
                        class="px-3 py-1 rounded-full text-xs font-medium <?= $doctor['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                        <?= ucfirst($doctor['status']) ?>
                    </span>
                </div>

                <!-- Personal Information -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">
                        Personal Information
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-xs text-gray-500">Email</p>
                                <p class="text-sm font-medium text-gray-900" id="modal-email">
                                    <?= htmlspecialchars($doctor['email']) ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-xs text-gray-500">Phone</p>
                                <p class="text-sm font-medium text-gray-900" id="modal-phone">
                                    <?= htmlspecialchars($doctor['phone'] ?? 'N/A') ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-xs text-gray-500">Gender</p>
                                <p class="text-sm font-medium text-gray-900" id="modal-gender">
                                    <?= htmlspecialchars($doctor['gender'] ?? 'N/A') ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-xs text-gray-500">Date of Birth</p>
                                <p class="text-sm font-medium text-gray-900" id="modal-dob">
                                    <?= !empty($doctor['dob']) ? date('F j, Y', strtotime($doctor['dob'])) : 'N/A' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Professional Information -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">
                        Professional Information
                    </h4>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-xs text-gray-500">Specialization</p>
                                <div class="mt-1 flex flex-wrap gap-2" id="modal-specialization">
                                    <?php
                                    $specializations = !empty($doctor['specialization']) ? explode(',', $doctor['specialization']) : [];
                                    foreach ($specializations as $spec): ?>
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <?= htmlspecialchars(trim($spec)) ?>
                                        </span>
                                    <?php endforeach; ?>
                                    <?php if (empty($specializations)): ?>
                                        <span class="text-sm text-gray-500">N/A</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                    <path
                                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-xs text-gray-500">Experience</p>
                                <p class="text-sm font-medium text-gray-900">
                                    <span
                                        id="modal-experience"><?= htmlspecialchars($doctor['experience_years'] ?? '0') ?></span>
                                    Years
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Availability Information -->
                <div class="mb-6">
                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">
                        Availability
                    </h4>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 mb-2">Available Days</p>
                            <div class="flex flex-wrap gap-2" id="modal-available-days">
                                <?php
                                $availableDays = !empty($doctor['available_days']) ? explode(',', $doctor['available_days']) : [];
                                $dayNames = [
                                    'sunday',
                                    'monday',
                                    'tuesday',
                                    'wednesday',
                                    'thursday',
                                    'friday',
                                    'saturday'
                                ];
                                foreach ($availableDays as $day):
                                    if (in_array(strtolower(trim($day)), $dayNames)): ?>
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <?= ucfirst(trim($day)) ?>
                                        </span>
                                    <?php endif;
                                endforeach; ?>
                                <?php if (empty($availableDays)): ?>
                                    <span class="text-sm text-gray-500">N/A</span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs text-gray-500">Time From</p>
                                <p class="text-sm font-medium text-gray-900" id="modal-time-from">
                                    <?= !empty($doctor['available_time_from']) ? date('h:i A', strtotime($doctor['available_time_from'])) : 'N/A' ?>
                                </p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Time To</p>
                                <p class="text-sm font-medium text-gray-900" id="modal-time-to">
                                    <?= !empty($doctor['available_time_to']) ? date('h:i A', strtotime($doctor['available_time_to'])) : 'N/A' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Information -->
                <div>
                    <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-3">
                        System Information
                    </h4>
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="text-xs text-gray-500">Created At</p>
                                <p class="text-sm font-medium text-gray-900" id="modal-created-at">
                                    <?= !empty($doctor['created_at']) ? date('M j, Y, g:i A', strtotime($doctor['created_at'])) : 'N/A' ?>
                                </p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Updated At</p>
                                <p class="text-sm font-medium text-gray-900" id="modal-updated-at">
                                    <?= !empty($doctor['updated_at']) ? date('M j, Y, g:i A', strtotime($doctor['updated_at'])) : 'N/A' ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button"
                    class="close-modal w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
