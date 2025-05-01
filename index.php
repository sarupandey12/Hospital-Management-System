<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Hospital Management System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="dist/output.css">

</head>
<body class="bg-gray-50 font-sans">

  <!-- Navbar -->
  <header class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-blue-700">MediCare+</h1>
      <nav class="space-x-6 text-gray-700 font-medium">
        <a href="index.php" class="hover:text-blue-600">Home</a>
        <a href="#" class="hover:text-blue-600">Departments</a>
        <a href="#" class="hover:text-blue-600">Doctors</a>
        <a href="#" class="hover:text-blue-600">Contact</a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
<section class="bg-blue-600 text-white py-20">
  <div class="max-w-5xl mx-auto px-4 text-center">
    <h2 class="text-4xl md:text-5xl font-bold mb-4">Welcome to MediCare+</h2>
    <p class="text-lg md:text-xl mb-6">Efficient. Reliable. Digital. Your health, our priority.</p>
    
    <div class="space-y-4">
      <a href="#" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded-full shadow hover:bg-gray-100 transition inline-block">
        Book an Appointment
      </a>
      <br/>
      <!-- <a href="#" class="bg-blue-500 text-white font-semibold px-6 py-3 rounded-full shadow hover:bg-blue-400 transition inline-block">
        Select Hospital
      </a> -->
    </div>

  </div>
</section>


  <!-- Services Section -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <h3 class="text-3xl font-bold text-center text-gray-800 mb-12">Our Services</h3>
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-gray-100 p-6 rounded-xl text-center shadow hover:shadow-lg transition">
          <img src="https://img.icons8.com/ios-filled/100/heart-health.png" class="mx-auto mb-4" alt="Cardiology"/>
          <h4 class="text-xl font-semibold mb-2">Cardiology</h4>
          <p class="text-gray-600">Advanced heart care services with expert cardiologists.</p>
        </div>
        <div class="bg-gray-100 p-6 rounded-xl text-center shadow hover:shadow-lg transition">
          <img src="https://img.icons8.com/ios-filled/100/stethoscope.png" class="mx-auto mb-4" alt="General Checkup"/>
          <h4 class="text-xl font-semibold mb-2">General Checkup</h4>
          <p class="text-gray-600">Routine health exams and diagnostics at your fingertips.</p>
        </div>
        <div class="bg-gray-100 p-6 rounded-xl text-center shadow hover:shadow-lg transition">
          <img src="https://img.icons8.com/ios-filled/100/ambulance.png" class="mx-auto mb-4" alt="Emergency"/>
          <h4 class="text-xl font-semibold mb-2">Emergency</h4>
          <p class="text-gray-600">24/7 emergency response with top-class facilities.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-blue-700 text-white py-6 mt-12">
    <div class="max-w-7xl mx-auto text-center">
      <p>&copy; 2025 MediCare+. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
