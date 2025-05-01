<?php
ob_start(); // Start output buffer
?>
<!-- Main Content -->
<!-- <main class="flex-1 p-6 bg-gray-100 min-h-screen"> -->
    
<main class="flex-1 p-6 bg-gray-100 overflow-y-auto h-[calc(100vh-64px)]">
<div class="container max-w-5xl mx-auto bg-white p-10 rounded-2xl shadow-lg transition-all duration-300 hover:shadow-xl">
       
    <!-- <div class="container max-w-5xl mx-auto bg-white rounded-2xl shadow-lg transition-all duration-300 hover:shadow-xl h-[80vh] overflow-y-auto p-10"> -->

    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-8 tracking-tight">Create New Doctor</h1>
        <form id="doctorForm" action="../../controllers/DoctorController.php" method="POST" enctype="multipart/form-data" class="space-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Full Name -->
                <div class="form-group">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" required
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-200">
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email" required
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-200">
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                    <input type="tel" id="phone" name="phone"
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-200">
                </div>

                <!-- Gender -->
                <div class="form-group col-span-1 md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gender</label>
                    <div class="flex gap-6">
                        <div class="flex items-center">
                            <input type="radio" id="male" name="gender" value="male" required
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300">
                            <label for="male" class="ml-2 text-sm text-gray-700">Male</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="female" name="gender" value="female"
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300">
                            <label for="female" class="ml-2 text-sm text-gray-700">Female</label>
                        </div>
                        <div class="flex items-center">
                            <input type="radio" id="other" name="gender" value="other"
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300">
                            <label for="other" class="ml-2 text-sm text-gray-700">Other</label>
                        </div>
                    </div>
                </div>

                <!-- Date of Birth -->
                <div class="form-group">
                    <label for="dob" class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth</label>
                    <input type="date" id="dob" name="dob"
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-200">
                </div>

                <!-- Specialization -->
                <div class="form-group">
                    <label for="specialization" class="block text-sm font-semibold text-gray-700 mb-2">Specialization <span class="text-red-500">*</span></label>
                    <input type="text" id="specialization" name="specialization" required
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-200">
                </div>

                <!-- Qualification -->
                <div class="form-group">
                    <label for="qualification" class="block text-sm font-semibold text-gray-700 mb-2">Qualification <span class="text-red-500">*</span></label>
                    <input type="text" id="qualification" name="qualification" required
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-200">
                </div>

                <!-- Experience -->
                <div class="form-group">
                    <label for="experience_years" class="block text-sm font-semibold text-gray-700 mb-2">Experience (Years)</label>
                    <input type="number" id="experience_years" name="experience_years" min="0"
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-200">
                </div>

                <!-- Available Days -->
                <div class="form-group col-span-1 md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Available Days</label>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="flex items-center">
                            <input type="checkbox" id="monday" name="available_days[]" value="Monday"
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                            <label for="monday" class="ml-2 text-sm text-gray-700">Monday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="tuesday" name="available_days[]" value="Tuesday"
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                            <label for="tuesday" class="ml-2 text-sm text-gray-700">Tuesday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="wednesday" name="available_days[]" value="Wednesday"
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                            <label for="wednesday" class="ml-2 text-sm text-gray-700">Wednesday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="thursday" name="available_days[]" value="Thursday"
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                            <label for="thursday" class="ml-2 text-sm text-gray-700">Thursday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="friday" name="available_days[]" value="Friday"
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                            <label for="friday" class="ml-2 text-sm text-gray-700">Friday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="saturday" name="available_days[]" value="Saturday"
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                            <label for="saturday" class="ml-2 text-sm text-gray-700">Saturday</label>
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="sunday" name="available_days[]" value="Sunday"
                                class="h-4 w-4 text-blue-500 focus:ring-blue-400 border-gray-300 rounded">
                            <label for="sunday" class="ml-2 text-sm text-gray-700">Sunday</label>
                        </div>
                    </div>
                </div>

                <!-- Available Time -->
                <div class="form-group">
                    <label for="available_time_from" class="block text-sm font-semibold text-gray-700 mb-2">Available Time From</label>
                    <input type="time" id="available_time_from" name="available_time_from"
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-200">
                </div>

                <div class="form-group">
                    <label for="available_time_to" class="block text-sm font-semibold text-gray-700 mb-2">Available Time To</label>
                    <input type="time" id="available_time_to" name="available_time_to"
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-200">
                </div>

                <!-- Profile Image -->
                <div class="form-group col-span-1 md:col-span-2">
                    <label for="profile_image" class="block text-sm font-semibold text-gray-700 mb-2">Profile Image</label>
                    <input type="file" id="profile_image" name="profile_image" accept="image/*"
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition duration-200">
                </div>

                <!-- Status -->
                <div class="form-group col-span-1 md:col-span-2">
                    <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                    <select id="status" name="status"
                        class="block w-full p-3 border border-gray-200 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition duration-200">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" name="insertD_doctor"
                class="w-full py-4 mt-8 bg-blue-600 text-white font-bold text-lg rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 transform hover:scale-105">
                Create Doctor
            </button>
        </form>
    </div>
</main>

<?php
$content = ob_get_clean();
include("../partials/master.php"); // Inject into master layout
?>