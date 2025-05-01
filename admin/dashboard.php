<?php
ob_start(); // Start output buffer
?>

   <!-- Main Content -->
    <main class="flex-1 p-6">


      <!-- Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
          <h3 class="text-lg font-semibold text-gray-600">Total Patients</h3>
          <p class="text-3xl font-bold text-green-600 mt-2">12</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
          <h3 class="text-lg font-semibold text-gray-600">Doctors</h3>
          <p class="text-3xl font-bold text-green-600 mt-2">5</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
          <h3 class="text-lg font-semibold text-gray-600">Appointments</h3>
          <p class="text-3xl font-bold text-green-600 mt-2">20</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 hover:shadow-lg transition">
          <h3 class="text-lg font-semibold text-gray-600">Departments</h3>
          <p class="text-3xl font-bold text-green-600 mt-2">12</p>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="mt-10 bg-white shadow rounded-2xl p-6">
        <h3 class="text-xl font-semibold text-gray-700 mb-4">Recent Appointments</h3>
        <table class="w-full text-left text-sm">
          <thead class="bg-green-100 text-gray-700 font-semibold">
            <tr>
              <th class="py-2 px-4">Patient</th>
              <th class="py-2 px-4">Doctor</th>
              <th class="py-2 px-4">Date</th>
              <th class="py-2 px-4">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b">
              <td class="py-2 px-4">John Doe</td>
              <td class="py-2 px-4">Dr. Smith</td>
              <td class="py-2 px-4">2025-04-20</td>
              <td class="py-2 px-4 text-green-600">Confirmed</td>
            </tr>
            <tr class="border-b">
              <td class="py-2 px-4">Jane Smith</td>
              <td class="py-2 px-4">Dr. Adams</td>
              <td class="py-2 px-4">2025-04-21</td>
              <td class="py-2 px-4 text-yellow-600">Pending</td>
            </tr>
            <tr>
              <td class="py-2 px-4">Alex Brown</td>
              <td class="py-2 px-4">Dr. White</td>
              <td class="py-2 px-4">2025-04-22</td>
              <td class="py-2 px-4 text-red-600">Cancelled</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>

<?php
$content = ob_get_clean(); // Store content in $content
include("partials/master.php"); // Inject into master layout
?>