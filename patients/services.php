<?php
ob_start(); // Start output buffer
session_start();

require_once __DIR__ . '/../models/Services.php';

// Redirect if not logged in
if (!isset($_SESSION['patient_id'])) {
    header("Location: ../patient/index.php");
    exit();
}

$servicesModel = new Services($pdo);
$services = $servicesModel->getServices();

?>


<!-- Dashboard Content -->
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="overflow-x-auto bg-white shadow-lg rounded-2xl p-6 mt-6">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">Available Services</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-blue-50 text-blue-800">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium">#</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Service Name</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Description</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Price (Rs)</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                <?php foreach ($services as $index => $service): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2"><?= $index + 1 ?></td>
                        <td class="px-4 py-2 font-semibold text-blue-700"><?= htmlspecialchars($service['name']) ?></td>
                        <td class="px-4 py-2"><?= htmlspecialchars($service['description']) ?></td>
                        <td class="px-4 py-2">Rs. <?= number_format($service['price'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>

<?php
$content = ob_get_clean(); // Store content in $content
include("partials/master.php"); // Inject into master layout
?>