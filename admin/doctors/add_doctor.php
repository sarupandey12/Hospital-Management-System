<?php
ob_start(); // Start output buffer
?>
<!-- Main Content -->
<main class="flex-1 p-6">
    <div class="container max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Create New Doctor</h1>
        <form id="doctorForm" enctype="multipart/form-data" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" id="phone" name="phone"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Gender -->
                <div class="form-group col-span-1 md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Gender</label>
                    <div class="flex gap-4">
                        <div class="flex items-center">
                            <input type="radio" id="male" name="gender" value="male" required
                                class="mr-2 text-blue-500">
                            <label for="male" class="text-sm text-gray-700">Male</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="female" name="gender" value="female" class="mr-2 text-blue-500">
                            <label for="female" class="text-sm text-gray-700">Female</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="other" name="gender" value="other" class="mr-2 text-blue-500">
                            <label for="other" class="text-sm text-gray-700">Other</label>
                        </div>
                    </div>
                </div>

                <!-- Date of Birth -->
                <div class="form-group">
                    <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                    <input type="date" id="dob" name="dob"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Specialization -->
                <div class="form-group">
                    <label for="specialization" class="block text-sm font-medium text-gray-700">Specialization <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="specialization" name="specialization" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Qualification -->
                <div class="form-group">
                    <label for="qualification" class="block text-sm font-medium text-gray-700">Qualification <span
                            class="text-red-500">*</span></label>
                    <input type="text" id="qualification" name="qualification" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Experience -->
                <div class="form-group">
                    <label for="experience_years" class="block text-sm font-medium text-gray-700">Experience
                        (Years)</label>
                    <input type="number" id="experience_years" name="experience_years" min="0"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Available Days -->
                <div class="form-group col-span-1 md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Available Days</label>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <input type="checkbox" id="monday" name="available_days[]" value="Monday" class="mr-2">
                            <label for="monday" class="text-sm text-gray-700">Monday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="tuesday" name="available_days[]" value="Tuesday" class="mr-2">
                            <label for="tuesday" class="text-sm text-gray-700">Tuesday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="wednesday" name="available_days[]" value="Wednesday"
                                class="mr-2">
                            <label for="wednesday" class="text-sm text-gray-700">Wednesday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="thursday" name="available_days[]" value="Thursday" class="mr-2">
                            <label for="thursday" class="text-sm text-gray-700">Thursday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="friday" name="available_days[]" value="Friday" class="mr-2">
                            <label for="friday" class="text-sm text-gray-700">Friday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="saturday" name="available_days[]" value="Saturday" class="mr-2">
                            <label for="saturday" class="text-sm text-gray-700">Saturday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="sunday" name="available_days[]" value="Sunday" class="mr-2">
                            <label for="sunday" class="text-sm text-gray-700">Sunday</label>
                        </div>
                    </div>
                </div>

                <!-- Available Time -->
                <div class="form-group">
                    <label for="available_time_from" class="block text-sm font-medium text-gray-700">Available Time
                        From</label>
                    <input type="time" id="available_time_from" name="available_time_from"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="form-group">
                    <label for="available_time_to" class="block text-sm font-medium text-gray-700">Available Time
                        To</label>
                    <input type="time" id="available_time_to" name="available_time_to"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Profile Image -->
                <div class="form-group col-span-1 md:col-span-2">
                    <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                    <input type="file" id="profile_image" name="profile_image" accept="image/*"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                </div>

                <!-- Status -->
                <div class="form-group col-span-1 md:col-span-2">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" name="status"
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="on_leave">On Leave</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-3 mt-6 bg-blue-500 text-white font-bold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Create
                Doctor</button>
        </form>
    </div>
</main>
<script>
    document.getElementById('doctorForm').addEventListener('submit', function (e) {
        e.preventDefault();
        // Form validation and submission logic would go here
        console.log('Form submitted');
    });
</script>


<?php
$content = ob_get_clean();
include("../partials/master.php"); // Inject into master layout
?>