<?php
ob_start();
?>

<main class="flex-1 p-6">
    <div class="max-w-3xl mx-auto bg-white shadow rounded-2xl p-8 mt-10">

        <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">Book an Appointment</h2>

        <form action="save_appointment.php" method="POST" class="space-y-6">
            
            <!-- Patient Name -->
            <div>
                <label class="block mb-1 text-gray-600">Full Name</label>
                <input type="text" name="patient_name" required
                       class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <!-- Email -->
            <div>
                <label class="block mb-1 text-gray-600">Email Address</label>
                <input type="email" name="email" required
                       class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <!-- Phone -->
            <div>
                <label class="block mb-1 text-gray-600">Phone Number</label>
                <input type="text" name="phone" required
                       class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <!-- Select Doctor -->
            <div>
                <label class="block mb-1 text-gray-600">Select Doctor</label>
                <select name="doctor" required
                        class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <option value="">-- Choose Doctor --</option>
                    <option value="Dr. Smith">Dr. Smith (Cardiology)</option>
                    <option value="Dr. Adams">Dr. Adams (Orthopedics)</option>
                    <option value="Dr. White">Dr. White (Neurology)</option>
                </select>
            </div>

            <!-- Appointment Date -->
            <div>
                <label class="block mb-1 text-gray-600">Preferred Date</label>
                <input type="date" name="appointment_date" required
                       class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" />
            </div>

            <!-- Message -->
            <div>
                <label class="block mb-1 text-gray-600">Reason / Message</label>
                <textarea name="message" rows="4"
                          class="w-full border border-gray-300 p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                        class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-full hover:bg-blue-700 transition">
                    Confirm Appointment
                </button>
            </div>

        </form>

    </div>
</main>

<?php
$content = ob_get_clean();
include("partials/master.php");
?>
