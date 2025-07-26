<?php
require_once __DIR__."/../../config/path.php";
include BASE_PATH . '/layouts/master.php';
?>
<nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center space-x-2">
                <div
                    class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-heartbeat text-white text-xl"></i>
                </div>
                <a href="<?= BASE_URL ?>"
                    class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">MediCare</a>
            </div>

            <div class="hidden md:flex space-x-8">
                <a href="#features" class="nav-link text-gray-700 hover:text-blue-600">Features</a>
                <a href="#about" class="nav-link text-gray-700 hover:text-blue-600">About</a>
                <a href="#testimonials" class="nav-link text-gray-700 hover:text-blue-600">Testimonials</a>
                <a href="#contact" class="nav-link text-gray-700 hover:text-blue-600">Contact</a>
            </div>

            <div class="flex items-center space-x-4">
                <a href="<?= BASE_URL ?>/patients/index.php"
                    class="hidden md:block text-gray-700 hover:text-blue-600 transition-colors">Sign
                    In</a>
                <a href="<?= BASE_URL ?>/patients/register.php" class="btn-primary text-white px-6 py-2 rounded-full hover:shadow-lg">Get
                    Started</a>
            </div>

            <button class="md:hidden text-gray-700">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
    </div>
</nav>