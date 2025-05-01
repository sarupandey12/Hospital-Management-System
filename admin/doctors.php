<?php
ob_start(); // Start output buffer
?>

<!-- Main Content -->
<main class="flex-1 p-6">

    <!-- Page Heading -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-700">Doctor Management</h2>
        <a href="add_doctor.php" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-user-md mr-2"></i> Add New Doctor
        </a>
    </div>

    <!-- Doctors Table -->
    <div class="bg-white shadow rounded-2xl overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-green-100 text-gray-700 uppercase tracking-wider">
                <tr>
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Doctor</th>
                    <th class="py-3 px-6">Specialization</th>
                    <th class="py-3 px-6">Phone</th>
                    <th class="py-3 px-6">Status</th>
                    <th class="py-3 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">

                <!-- Doctor 1 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 px-6 font-medium text-gray-900">#D-001</td>
                    <td class="py-4 px-6 flex items-center space-x-3">
                        <img src="https://randomuser.me/api/portraits/men/11.jpg" alt="Doctor Photo" class="w-10 h-10 rounded-full">
                        <div>
                            <div class="font-semibold">Dr. John Smith</div>
                            <div class="text-gray-500 text-xs">john.smith@example.com</div>
                        </div>
                    </td>
                    <td class="py-4 px-6">Cardiologist</td>
                    <td class="py-4 px-6 text-gray-600">(555) 111-2233</td>
                    <td class="py-4 px-6">
                        <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">Active</span>
                    </td>
                    <td class="py-4 px-6 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="text-yellow-500 hover:text-yellow-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <!-- Doctor 2 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 px-6 font-medium text-gray-900">#D-002</td>
                    <td class="py-4 px-6 flex items-center space-x-3">
                        <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Doctor Photo" class="w-10 h-10 rounded-full">
                        <div>
                            <div class="font-semibold">Dr. Emily Johnson</div>
                            <div class="text-gray-500 text-xs">emily.johnson@example.com</div>
                        </div>
                    </td>
                    <td class="py-4 px-6">Neurologist</td>
                    <td class="py-4 px-6 text-gray-600">(555) 222-3344</td>
                    <td class="py-4 px-6">
                        <span class="bg-yellow-100 text-yellow-700 text-xs font-semibold px-2 py-1 rounded-full">On Leave</span>
                    </td>
                    <td class="py-4 px-6 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="text-yellow-500 hover:text-yellow-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>

                <!-- Doctor 3 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4 px-6 font-medium text-gray-900">#D-003</td>
                    <td class="py-4 px-6 flex items-center space-x-3">
                        <img src="https://randomuser.me/api/portraits/men/75.jpg" alt="Doctor Photo" class="w-10 h-10 rounded-full">
                        <div>
                            <div class="font-semibold">Dr. Michael Brown</div>
                            <div class="text-gray-500 text-xs">michael.brown@example.com</div>
                        </div>
                    </td>
                    <td class="py-4 px-6">Pediatrician</td>
                    <td class="py-4 px-6 text-gray-600">(555) 333-4455</td>
                    <td class="py-4 px-6">
                        <span class="bg-red-100 text-red-700 text-xs font-semibold px-2 py-1 rounded-full">Inactive</span>
                    </td>
                    <td class="py-4 px-6 text-right">
                        <div class="flex justify-end space-x-2">
                            <a href="#" class="text-blue-600 hover:text-blue-900">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="#" class="text-yellow-500 hover:text-yellow-700">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</main>

<?php
$content = ob_get_clean();
include("partials/master.php"); // Inject into master layout
?>
