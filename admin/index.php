<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
  <link rel="stylesheet" href="style.css">
</head>


<body>

    <header>
        <h1>Welcome to Our Hospital Management System</h1>
        <nav>
            <ul>
                <li><a href="insert_service.php">Services</a></li>
                <li><a href="doctors.php">Doctors</a></li>
                <li><a href="appointment.php">Book Appointment</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h2>Efficient Healthcare Management</h2>
        <p>Book appointments, manage records, and access top-notch healthcare services.</p>
        <a href="appointment.php" class="btn">Book an Appointment</a>
    </section>

    <footer>
        <p>&copy; 2025 Hospital Management System. All rights reserved.</p>
    </footer>

</body>
</html>

 -->


 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login - Hospital Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-100 to-blue-300 min-h-screen flex items-center justify-center">

  <div class="bg-white shadow-xl rounded-2xl p-8 md:w-96 w-full">
    <div class="text-center mb-6">
      <h2 class="text-2xl font-bold text-blue-700">Admin Login</h2>
      <p class="text-gray-500 text-sm">Hospital Management System</p>
    </div>

    <form action="../controllers/AdminController.php" method="POST" class="space-y-5">
      <!-- Username Field -->
      <div>
        <label for="username" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="text" id="Email" name="email" required
               class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"/>
      </div>

      <!-- Password Field -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" required
               class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"/>
      </div>

      <!-- Submit Button -->
      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded-xl shadow-md transition duration-300">
        Login
      </button>
    </form>

    <!-- Optional Links -->
    <div class="text-center mt-4">
      <a href="#" class="text-sm text-blue-600 hover:underline">Forgot Password?</a>
    </div>
  </div>

</body>
</html>
