<?php
// session_start();

// Redirect if not logged in
// if (!isset($_SESSION['admin_id'])) {
//     header("Location: ../admin/index.php");
//     exit();
// }

// Get current page and folder
$current_page = basename($_SERVER['PHP_SELF']);
$current_folder = basename(dirname($_SERVER['PHP_SELF']));

// Base path to handle relative navigation
$base_path = ($current_folder === 'admin') ? '' : '../';

// Helper function for active class
function isActive($check, $type = 'page')
{
    global $current_page, $current_folder;
    if ($type === 'page')
        return $current_page === $check ? 'bg-green-100 text-green-600' : '';
    return $current_folder === $check ? 'bg-green-100 text-green-600' : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - HMS</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md hidden md:block">
            <div class="p-6 text-center border-b border-gray-200">
                <h1 class="text-2xl font-bold text-green-600">HMS Admin</h1>
            </div>
            <nav class="p-4 space-y-2">

                <a href="<?php echo ($current_page === 'dashboard.php') ? 'dashboard.php' : '../dashboard.php'; ?>"
                    class="block py-2 px-4 rounded-lg text-gray-700 hover:bg-green-100 <?php echo isActive('dashboard.php'); ?>">
                    Dashboard
                </a>

                <a href="#"
                    class="block py-2 px-4 rounded-lg text-gray-700 hover:bg-green-100 <?php echo isActive('appointments', 'folder'); ?>">
                    Appointments
                </a>

                <a href="<?php echo $base_path; ?>doctors/doctors.php"
                    class="block py-2 px-4 rounded-lg text-gray-700 hover:bg-green-100 <?php echo isActive('doctors', 'folder'); ?>">
                    Doctors
                </a>

                <a href="<?php echo $base_path; ?>patients/patients.php"
                    class="block py-2 px-4 rounded-lg text-gray-700 hover:bg-green-100 <?php echo isActive('patients', 'folder'); ?>">
                    Patients
                </a>

                <a href="#"
                    class="block py-2 px-4 rounded-lg text-gray-700 hover:bg-green-100 <?php echo isActive('services', 'folder'); ?>">
                    Services
                </a>

                <a href="#"
                    class="block py-2 px-4 rounded-lg text-gray-700 hover:bg-green-100 <?php echo isActive('settings.php'); ?>">
                    Settings
                </a>

                <form action="<?php echo $base_path; ?>controllers/AdminController.php" method="POST">
                    <input type="hidden" name="action" value="logout" />
                    <button type="submit"
                        class="block w-full text-left py-2 px-4 rounded-lg text-red-600 hover:bg-red-100">
                        Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 relative overflow-hidden">
            <!-- Fixed Top Bar -->
            <header
                class="fixed top-0 left-64 right-0 z-50 flex justify-between items-center bg-white shadow-lg rounded-lg p-4 transition-all duration-300 hover:shadow-xl">
                <h2
                    class="text-3xl font-bold text-gray-800 tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                    Dashboard
                </h2>
                <div class="flex items-center space-x-6">
                    <span class="text-gray-700 font-medium hover:text-blue-600 transition-colors duration-200">
                        Hello, Admin
                    </span>
                    <div class="relative">
                        <img src="https://via.placeholder.com/40"
                            class="w-12 h-12 rounded-full border-4 border-blue-100 shadow-md hover:scale-110 transition-transform duration-200"
                            alt="Admin Profile" />
                        <span
                            class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></span>
                    </div>
                </div>
            </header>

            <!-- Scrollable Content Area -->
            <div class="overflow-y-auto h-[calc(100vh-96px)] mt-24 p-2">