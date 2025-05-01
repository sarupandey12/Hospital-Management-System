<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System - Patient Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-blue-600">MediCare</h1>
                <p class="text-gray-600 mt-2">Hospital Management System</p>
            </div>

            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Patient Registration</h2>

            <!-- Patient Registration Form -->
            <form action="../controllers/PatientController.php" method="POST" class="space-y-6">
                <?php if (isset($_GET['error'])): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline"><?php echo htmlspecialchars($_GET['error']); ?></span>
                    </div>
                <?php endif; ?>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="full_name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input id="full_name" name="full_name" type="text" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border">
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                        <input id="email" name="email" type="email" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border">
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                        <input id="phone" name="phone" type="text" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border">
                    </div>

                    <div>
                        <label for="gender" class="block text-gray-700 font-medium mb-2">Gender</label>
                        <select id="gender" name="gender" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <div>
                        <label for="date_of_birth" class="block text-gray-700 font-medium mb-2">Date of Birth</label>
                        <input id="date_of_birth" name="date_of_birth" type="date" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border">
                    </div>

                    <div>
                        <label for="blood_group" class="block text-gray-700 font-medium mb-2">Blood Group</label>
                        <select id="blood_group" name="blood_group" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border">
                            <option value="">Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password </label>
                        <input id="password" name="password" type="password" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border">
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                        <input id="password" name="confirm_password" type="password" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border">
                    </div>

                    <div class="md:col-span-2">
                        <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                        <textarea id="address" name="address" rows="3" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border"></textarea>
                    </div>

                    <div class="md:col-span-2">
                        <label for="medical_history" class="block text-gray-700 font-medium mb-2">Medical
                            History</label>
                        <textarea id="medical_history" name="medical_history" rows="4"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border"></textarea>
                    </div>



                    <div class="flex items-end">
                        <button type="submit" name="register"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Register Patient
                        </button>
                    </div>

                </div>
            </form>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Already registered?
                    <a href="index.php" class="font-medium text-blue-600 hover:text-blue-500">Sign in</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>