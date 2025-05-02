<?php
ob_start(); // Start output buffer
session_start();

// Redirect if not logged in
if (!isset($_SESSION['patient_id'])) {
    header("Location: ../patient/index.php");
    exit();
}
?>

<!-- Dashboard Content -->
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <!-- Quick Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100 transition-all hover:shadow-md">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Next Appointment</p>
                    <p class="text-xl font-bold text-gray-800 mt-1">May 2, 10:30 AM</p>
                </div>
                <div class="p-2 rounded-lg bg-blue-50 text-blue-600">
                    <i class="fas fa-calendar text-lg"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-2">Dr. Michael Carter</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100 transition-all hover:shadow-md">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Prescriptions</p>
                    <p class="text-xl font-bold text-gray-800 mt-1">3 Active</p>
                </div>
                <div class="p-2 rounded-lg bg-green-50 text-green-600">
                    <i class="fas fa-prescription-bottle-alt text-lg"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-2">2 Refills Available</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100 transition-all hover:shadow-md">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Lab Results</p>
                    <p class="text-xl font-bold text-gray-800 mt-1">2 New</p>
                </div>
                <div class="p-2 rounded-lg bg-purple-50 text-purple-600">
                    <i class="fas fa-flask text-lg"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-2">Updated 3 days ago</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border border-gray-100 transition-all hover:shadow-md">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500">Your Balance</p>
                    <p class="text-xl font-bold text-gray-800 mt-1">$125.00</p>
                </div>
                <div class="p-2 rounded-lg bg-yellow-50 text-yellow-600">
                    <i class="fas fa-dollar-sign text-lg"></i>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-2">Last payment: Apr 15</p>
        </div>
    </div>

    <!-- Our Services Section -->
    <div class="mb-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-800">Our Services</h2>
            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div
                class="service-card bg-white rounded-xl shadow-sm overflow-hidden transition-all border border-gray-100">
                <div class="h-40 bg-blue-600 flex items-center justify-center">
                    <i class="fas fa-heartbeat text-white text-4xl"></i>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800">Cardiology</h3>
                    <p class="text-sm text-gray-600 mt-1">Expert care for heart conditions with
                        state-of-the-art diagnostics.</p>
                    <a href="#" class="mt-3 inline-block text-blue-600 hover:text-blue-800 text-sm font-medium">Learn
                        more →</a>
                </div>
            </div>

            <div
                class="service-card bg-white rounded-xl shadow-sm overflow-hidden transition-all border border-gray-100">
                <div class="h-40 bg-green-600 flex items-center justify-center">
                    <i class="fas fa-brain text-white text-4xl"></i>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800">Neurology</h3>
                    <p class="text-sm text-gray-600 mt-1">Comprehensive care for neurological disorders and
                        conditions.</p>
                    <a href="#" class="mt-3 inline-block text-blue-600 hover:text-blue-800 text-sm font-medium">Learn
                        more →</a>
                </div>
            </div>

            <div
                class="service-card bg-white rounded-xl shadow-sm overflow-hidden transition-all border border-gray-100">
                <div class="h-40 bg-purple-600 flex items-center justify-center">
                    <i class="fas fa-baby text-white text-4xl"></i>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800">Pediatrics</h3>
                    <p class="text-sm text-gray-600 mt-1">Specialized care for infants, children, and
                        adolescents.</p>
                    <a href="#" class="mt-3 inline-block text-blue-600 hover:text-blue-800 text-sm font-medium">Learn
                        more →</a>
                </div>
            </div>

            <div
                class="service-card bg-white rounded-xl shadow-sm overflow-hidden transition-all border border-gray-100">
                <div class="h-40 bg-red-600 flex items-center justify-center">
                    <i class="fas fa-bone text-white text-4xl"></i>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800">Orthopedics</h3>
                    <p class="text-sm text-gray-600 mt-1">Treatment for bone, joint, and muscle conditions
                        and injuries.</p>
                    <a href="#" class="mt-3 inline-block text-blue-600 hover:text-blue-800 text-sm font-medium">Learn
                        more →</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Doctors Section -->
    <div class="mb-10">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-bold text-gray-800">Our Doctors</h2>
            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div
                class="doctor-card bg-white rounded-lg shadow-sm overflow-hidden transition-all border border-gray-100">
                <div class="relative">
                    <img src="/api/placeholder/400/250" alt="Doctor" class="w-full h-48 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                        <span class="inline-block px-2 py-1 bg-blue-600 text-white text-xs rounded-md">Cardiology</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800">Dr. Michael Carter</h3>
                    <p class="text-sm text-gray-600">Cardiologist, 15+ years exp.</p>
                    <div class="flex items-center mt-2">
                        <div class="flex">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                        </div>
                        <span class="text-xs text-gray-600 ml-1">5.0</span>
                    </div>
                    <button
                        class="mt-4 w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition-all">
                        Book Appointment
                    </button>
                </div>
            </div>

            <div
                class="doctor-card bg-white rounded-lg shadow-sm overflow-hidden transition-all border border-gray-100">
                <div class="relative">
                    <img src="/api/placeholder/400/250" alt="Doctor" class="w-full h-48 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                        <span class="inline-block px-2 py-1 bg-green-600 text-white text-xs rounded-md">Neurology</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800">Dr. Emily Williams</h3>
                    <p class="text-sm text-gray-600">Neurologist, 12+ years exp.</p>
                    <div class="flex items-center mt-2">
                        <div class="flex">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star-half-alt text-yellow-400"></i>
                        </div>
                        <span class="text-xs text-gray-600 ml-1">4.7</span>
                    </div>
                    <button
                        class="mt-4 w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition-all">
                        Book Appointment
                    </button>
                </div>
            </div>

            <div
                class="doctor-card bg-white rounded-lg shadow-sm overflow-hidden transition-all border border-gray-100">
                <div class="relative">
                    <img src="/api/placeholder/400/250" alt="Doctor" class="w-full h-48 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                        <span
                            class="inline-block px-2 py-1 bg-purple-600 text-white text-xs rounded-md">Pediatrics</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800">Dr. Sarah Thompson</h3>
                    <p class="text-sm text-gray-600">Pediatrician, 10+ years exp.</p>
                    <div class="flex items-center mt-2">
                        <div class="flex">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                        </div>
                        <span class="text-xs text-gray-600 ml-1">4.9</span>
                    </div>
                    <button
                        class="mt-4 w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition-all">
                        Book Appointment
                    </button>
                </div>
            </div>

            <div
                class="doctor-card bg-white rounded-lg shadow-sm overflow-hidden transition-all border border-gray-100">
                <div class="relative">
                    <img src="/api/placeholder/400/250" alt="Doctor" class="w-full h-48 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                        <span class="inline-block px-2 py-1 bg-red-600 text-white text-xs rounded-md">Orthopedics</span>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-800">Dr. Robert Chen</h3>
                    <p class="text-sm text-gray-600">Orthopedic Surgeon, 18+ years exp.</p>
                    <div class="flex items-center mt-2">
                        <div class="flex">
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-yellow-400"></i>
                            <i class="fas fa-star text-gray-300"></i>
                        </div>
                        <span class="text-xs text-gray-600 ml-1">4.2</span>
                    </div>
                    <button
                        class="mt-4 w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition-all">
                        Book Appointment
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Two Column Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
        <!-- Upcoming Appointments -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-4 py-5 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-800">Upcoming Appointments</h3>
                    <button class="text-sm text-blue-600 hover:text-blue-800 font-medium">See All</button>
                </div>
                <div class="divide-y divide-gray-100">
                    <div class="p-4 hover:bg-gray-50 transition-all">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full object-cover border border-gray-200"
                                    src="/api/placeholder/100/100" alt="Doctor profile">
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Dr. Michael Carter
                                        </h4>
                                        <p class="text-xs text-gray-500">Cardiology</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-900">May 2, 2025</p>
                                        <p class="text-xs text-gray-500">10:30 AM</p>
                                    </div>
                                </div>
                                <div class="mt-3 flex justify-between items-center">
                                    <div class="inline-flex items-center text-xs text-gray-500">
                                        <i class="fas fa-map-marker-alt mr-1 text-blue-600"></i>
                                        Main Building, Room 305
                                    </div>
                                    <div class="flex space-x-2">
                                        <button
                                            class="px-2 py-1 text-xs rounded border border-blue-600 text-blue-600 hover:bg-blue-50">Reschedule</button>
                                        <button
                                            class="px-2 py-1 text-xs rounded bg-blue-600 text-white hover:bg-blue-700">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 hover:bg-gray-50 transition-all">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full object-cover border border-gray-200"
                                    src="/api/placeholder/100/100" alt="Doctor profile">
                            </div>
                            <div class="ml-4 flex-1">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-900">Dr. Robert Chen</h4>
                                        <p class="text-xs text-gray-500">Orthopedics</p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-sm font-medium text-gray-900">May 8, 2025</p>
                                        <p class="text-xs text-gray-500">2:15 PM</p>
                                    </div>
                                </div>
                                <div class="mt-3 flex justify-between items-center">
                                    <div class="inline-flex items-center text-xs text-gray-500">
                                        <i class="fas fa-map-marker-alt mr-1 text-blue-600"></i>
                                        South Wing, Room 118
                                    </div>
                                    <div class="flex space-x-2">
                                        <button
                                            class="px-2 py-1 text-xs rounded border border-blue-600 text-blue-600 hover:bg-blue-50">Reschedule</button>
                                        <button
                                            class="px-2 py-1 text-xs rounded bg-blue-600 text-white hover:bg-blue-700">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 hover:bg-gray-50 transition-all">
                        <a href="#" class="text-center block text-blue-600 hover:text-blue-800 text-sm font-medium">
                            + Book New Appointment
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Health Tips -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
                <div class="accent-gradient-bg px-4 py-5 text-white">
                    <h3 class="text-lg font-medium">Health Tips & Resources</h3>
                    <p class="text-sm opacity-80 mt-1">Stay healthy with our expert advice</p>
                </div>
                <div class="divide-y divide-gray-100">
                    <div class="p-4 hover:bg-gray-50 transition-all">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 p-2 rounded-lg bg-blue-50 text-blue-600">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-900">Cardiovascular Health</h4>
                                <p class="text-xs text-gray-500 mt-1">Tips for maintaining a healthy heart.
                                </p>
                                <a href="#" class="text-xs text-blue-600 hover:text-blue-800 mt-1 inline-block">Read
                                    more →</a>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 hover:bg-gray-50 transition-all">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 p-2 rounded-lg bg-green-50 text-green-600">
                                <i class="fas fa-apple-alt"></i>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-sm font-medium text-gray-900">Nutrition Guide</h4>
                                <p class="text-xs text-gray-500"></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$content = ob_get_clean(); // Store content in $content
include("partials/master.php"); // Inject into master layout
?>