<?php
ob_start(); // Start output buffer
session_start();

require_once __DIR__ . '/../../models/Appointment.php';

// Redirect if not logged in
if (!isset($_SESSION['patient_id'])) {
    header("Location: ../patient/index.php");
    exit();
}

$appointmentModel = new Appointment($pdo);
$appointments = $appointmentModel->getPatientAppointments($_SESSION['patient_id']);

// print_r($appointments);
?>

<!-- Dashboard Content -->
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="overflow-x-auto mt-8">
        <h2 class="text-2xl font-bold mb-4 text-blue-700">Patient Appointments</h2>

        <table class="min-w-full divide-y divide-gray-200 shadow rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Patient Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Service</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Priority</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Example Rows -->
                <?php foreach ($appointments as $index => $app): ?>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap"><?= $index + 1 ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($app['patient_name']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($app['service_name']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
              <?= $app['priority_label'] === 'High' ? 'bg-red-100 text-red-800' :
                  ($app['priority_label'] === 'Medium' ? 'bg-yellow-100 text-yellow-800' :
                      'bg-green-100 text-green-800') ?>">
                                <?= htmlspecialchars($app['priority_label']) ?>
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap"><?= date('M d, Y', strtotime($app['appointment_date'])) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full
              <?= $app['status'] === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                  ($app['status'] === 'approved' ? 'bg-green-100 text-green-800' :
                      'bg-red-100 text-red-800') ?>">
                                <?= ucfirst($app['status']) ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


</div>


<?php
$content = ob_get_clean(); // Store content in $content
include("../partials/master.php"); // Inject into master layout
?>