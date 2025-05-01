<?php
ob_start(); // Start output buffer

require_once '../../models/Doctor.php'; // Include the Doctor model

$doctor = new Doctor($pdo);           // Initialize Doctor with PDO

$doctors = $doctor->getAllDoctors();

?>

<!-- Main Content -->
<main class="flex-1 p-6">

    <!-- Page Heading -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">Doctor Management</h2>
        <a href="add_doctor.php"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-user-md mr-2"></i> Add New Doctor
        </a>
    </div>

    <?php if (isset($_GET['deleted'])): ?>
        <div id="deleteAlert"
            class="fixed top-5 right-5 bg-green-100 text-green-800 p-4 rounded shadow-lg z-50 transition-opacity duration-300">
            Doctor deleted successfully.
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['created'])): ?>
        <div id="successAlert"
            class="fixed top-5 right-5 bg-green-100 text-green-800 p-4 rounded shadow-lg z-50 transition-opacity duration-300">
            Doctor created successfully.
        </div>
    <?php endif; ?>




    <!-- Doctors Table -->
    <div class="bg-white shadow rounded-2xl overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-green-100 text-gray-700 uppercase tracking-wider">
                <tr>
                    <!-- <th class="py-3 px-6">ID</th> -->
                    <th class="py-3 px-6">S.N.</th>
                    <th class="py-3 px-6">Doctor</th>
                    <th class="py-3 px-6">Specialization</th>
                    <th class="py-3 px-6">Phone</th>
                    <th class="py-3 px-6">Status</th>
                    <th class="py-3 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                <!-- Doctor 1 -->
                <?php
                if (!empty($doctors))
                    foreach ($doctors as $key => $doctor): ?>
                        <tr class="hover:bg-gray-50 transition">
                            <!-- <td class="py-4 px-6 font-medium text-gray-900">#D-001</td> -->
                            <td class="py-4 px-6 font-medium text-gray-900"><?= ++$key ?></td>
                            <td class="py-4 px-6 flex items-center space-x-3">
                                <img src="<?= !empty($doctor['profile_image']) ? '../../public/uploads/doctors/' . $doctor['profile_image'] : '../../public/default.jpg'; ?>"
                                    height="50px" width="50px" alt="Doctor Image">


                                <div>
                                    <div class="font-semibold"><?= $doctor['name']; ?></div>
                                    <div class="text-gray-500 text-xs"><?= $doctor['email'] ?></div>
                                </div>
                            </td>
                            <td class="py-4 px-6"><?= $doctor['specialization'] ?></td>
                            <td class="py-4 px-6 text-gray-600"><?= $doctor['phone'] ?></td>
                            <td class="py-4 px-6">
                                <span
                                    class=" <?= $doctor['status'] == 'active' ? ' bg-green-400 text-white' : 'bg-red-400 text-white' ?> text-green-700 text-xs font-semibold px-2 py-1 rounded-full"><?= $doctor['status'] == 'active' ? 'Active' : 'In Active' ?></span>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <div class="flex justify-end space-x-2">
                                    <a href="#" class="text-blue-600 hover:text-blue-900">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <a href="#" class="text-yellow-500 hover:text-yellow-700">
                                        <i class="fa-solid fa-pen-to-square"></i> <!-- fa-edit is now pen-to-square -->
                                    </a>
                                    <a href="../../controllers/DoctorController.php?action=delete&id=<?= $doctor['id'] ?>"
                                        onclick="return confirm('Are you sure you want to delete this doctor?')"
                                        class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </div>
                            </td>

                        </tr>
                    <?php endforeach; else { ?>
                    <tr><?= "No data found"; ?> </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</main>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const alert = document.getElementById('deleteAlert');
        if (alert) {
            setTimeout(() => {
                alert.classList.add('opacity-0');
                setTimeout(() => alert.remove(), 300); // Wait for fade-out
            }, 3000); // Show for 3 seconds
        }
    });
</script>

<?php
$content = ob_get_clean();
include("../partials/master.php"); // Inject into master layout
?>