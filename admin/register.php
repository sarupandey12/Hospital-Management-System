<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Register - Hospital Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-green-100 to-blue-200 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-xl rounded-2xl p-8 md:w-96 w-full">
    <div class="text-center mb-6">
      <h2 class="text-2xl font-bold text-green-700">Admin Registration</h2>
      <p class="text-gray-500 text-sm">Hospital Management System</p>
    </div>

    <form action="../controllers/AdminController.php" method="POST" class="space-y-5">
      <!-- Full Name -->
      <div>
        <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" id="full_name" name="full_name" required
               class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500"/>
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" required
               class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500"/>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
               class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500"/>
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required
               class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-500"/>
      </div>

      <!-- Register Button -->
      <button type="submit" name="register"
              class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-xl shadow-md transition duration-300">
        Register
      </button>
    </form>

    <!-- Link to Login -->
    <div class="text-center mt-4">
      <p class="text-sm text-gray-600">
        Already registered?
        <a href="login.php" class="text-green-600 hover:underline">Login here</a>
      </p>
    </div>
  </div>

</body>
</html>