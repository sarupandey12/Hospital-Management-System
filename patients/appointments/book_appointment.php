<?php

use Models\Priority;
ob_start(); // Start output buffer
session_start();

// Redirect if not logged in
if (!isset($_SESSION['patient_id'])) {
    header("Location: ../patient/index.php");
    exit();
}

require_once __DIR__ . '/../../models/Patient.php';
require_once __DIR__ . '/../../models/Services.php';
require_once __DIR__ . '/../../models/Priority.php';

$patient = new Patient($pdo);
$service = new Services($pdo);

$patient_id = $_SESSION['patient_id'];

// To get one patient
$patientData = $patient->getPatientDetail($patient_id);
$services = $service->getServices();
$priority = new Priority($pdo);

$priorityLevels = $priority->getPriorities();

// print_r($priorityLevels);

$formErrors = $_SESSION['form_errors'] ?? [];
unset($_SESSION['form_errors']);

?>


<?php if (!empty($_SESSION['form_errors'])): ?>
    <div class="text-red-600 mb-4">
        <ul>
            <?php foreach ($_SESSION['form_errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['form_errors']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['appointmen_success'])): ?>
    <div class="text-green-600 mb-4">
        <?= htmlspecialchars($_SESSION['appointmen_success']) ?>
    </div>
    <?php unset($_SESSION['appointmen_success']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['appointmen_failed'])): ?>
    <div class="text-red-600 mb-4">
        <?= htmlspecialchars($_SESSION['appointmen_failed']) ?>
    </div>
    <?php unset($_SESSION['appointmen_failed']); ?>
<?php endif; ?>


<!-- Dashboard Content -->
<div class=" flex justify-center items-center max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

    <form action="../../controllers/AppointmentController.php" method="POST"
        class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-xl space-y-6">
        <h2 class="text-2xl font-bold text-center text-blue-700">Patient Appointment Form</h2>

        <input type="hidden" name="patient_id" value="<?= $_SESSION['patient_id'] ?>" id="">
        <!-- Name -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
            <input type="text" name="name" placeholder="John Doe" value="<?= $patientData['full_name'] ?>" readonly
                class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
        </div>

        <!-- Age and Gender -->
        <div class="flex gap-4">

            <div class="w-1/2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                <select name="gender"
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="" disabled <?= empty($patientData['gender']) ? 'selected' : '' ?>>Select</option>
                    <option <?= (isset($patientData['gender']) && $patientData['gender'] === 'male') ? 'selected' : '' ?>>
                        Male</option>
                    <option <?= (isset($patientData['gender']) && $patientData['gender'] === 'female') ? 'selected' : '' ?>>Female</option>
                    <option <?= (isset($patientData['gender']) && $patientData['gender'] === 'Other') ? 'selected' : '' ?>>
                        Other</option>
                </select>
            </div>

            <div class="w-1/2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <input type="tel" name="phone" placeholder="98XXXXXXXX" value="<?= $patientData['phone'] ?>"
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

        </div>

        <?php
        $today = date('Y-m-d'); // e.g. 2025-07-24
        ?>
        <!-- <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Appointment Date</label>
            <input type="date" name="appointment_date"  min="<?= $today ?>"
                class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
        </div> -->

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Appointment Date <span class="text-red-500">*</span>
            </label>
            <input type="date" name="appointment_date" min="<?= $today ?>"
                class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">

            <?php if (in_array('Appointment date is required.', $formErrors)): ?>
                <p class="text-red-600 text-sm mt-1">Appointment date is required.</p>
            <?php elseif (in_array('Appointment date cannot be in the past.', $formErrors)): ?>
                <p class="text-red-600 text-sm mt-1">Appointment date cannot be in the past.</p>
            <?php endif; ?>
        </div>


        <div class="flex ">
            <div class="w-1/2">
                <h3 class="font-semibold mb-2">
                    Available Services <span class="text-red-500">*</span>
                </h3>
                <select name="service_id"
                    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="">Select</option>
                    <?php foreach ($services as $service): ?>
                        <option value="<?= htmlspecialchars($service['id']) ?>">
                            <?= htmlspecialchars($service['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <?php if (in_array('Please select a service.', $formErrors)): ?>
                    <p class="text-red-600 text-sm mt-1">Please select a service.</p>
                <?php endif; ?>
            </div>


        </div>


        <label for="priority_level_id" class="block text-sm font-medium text-gray-700 mb-1">
            Priority Level <span class="text-red-500">*</span>
        </label>
        <select name="priority_id" id="priority_level_id"
            class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none">
            <option value="" disabled selected>Select Priority</option>
            <?php foreach ($priorityLevels as $level): ?>
                <option value="<?= $level['priority_id'] ?>">
                    <?= htmlspecialchars($level['label']) ?> - <?= htmlspecialchars($level['description']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <?php if (in_array('Please select a priority level.', $formErrors)): ?>
            <p class="text-red-600 text-sm mt-1">Please select a priority level.</p>
        <?php endif; ?>


        <!-- Reason -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Reason for Visit</label>
            <textarea name="reason" rows="3" placeholder="Briefly explain..."
                class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" name="priority_store"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-xl shadow">
                Book Appointment
            </button>
        </div>
    </form>

</div>

<?php
$content = ob_get_clean(); // Store content in $content
include("../partials/master.php"); // Inject into master layout
?>