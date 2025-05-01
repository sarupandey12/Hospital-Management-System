<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare - Patient Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <style>
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .transition-all {
            transition: all 0.3s ease;
        }
        .gradient-bg {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        }
        .accent-gradient-bg {
            background: linear-gradient(135deg, #8b5cf6 0%, #6366f1 100%);
        }
        .blur-bg {
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.8);
        }
        .appointment-card {
            border-left: 4px solid #3b82f6;
        }
        .notification-dot {
            top: 2px;
            right: 2px;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <div class="min-h-screen flex flex-col">
        <!-- Top Navigation -->
        <nav class="bg-white shadow-md sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 flex items-center">
                            <span class="text-2xl font-bold text-blue-600">MediCare</span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <div class="hidden md:ml-6 md:flex md:space-x-8">
                            <a href="#" class="text-blue-600 border-b-2 border-blue-600 px-1 pt-1 text-sm font-medium">Dashboard</a>
                            <a href="#" class="text-gray-500 border-transparent hover:border-gray-300 hover:text-gray-700 px-1 pt-1 border-b-2 text-sm font-medium">Appointments</a>
                            <a href="#" class="text-gray-500 border-transparent hover:border-gray-300 hover:text-gray-700 px-1 pt-1 border-b-2 text-sm font-medium">Medical Records</a>
                        </div>
                        <div class="flex items-center ml-6">
                            <div class="relative">
                                <button type="button" class="p-1 text-gray-400 hover:text-gray-500 focus:outline-none">
                                    <span class="sr-only">View notifications</span>
                                    <div class="relative">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                        <span class="absolute notification-dot h-2 w-2 bg-red-500 rounded-full"></span>
                                    </div>
                                </button>
                            </div>
                            <div class="ml-4 relative flex-shrink-0">
                                <div class="flex items-center">
                                    <div class="mr-3 text-right hidden sm:block">
                                        <p class="text-sm font-medium text-gray-700">Sarah Johnson</p>
                                        <p class="text-xs text-gray-500">Patient ID: P-2023486</p>
                                    </div>
                                    <button type="button" class="flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <img class="h-8 w-8 rounded-full object-cover border border-gray-200" src="/api/placeholder/150/150" alt="User profile">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Mobile menu -->
        <!-- <div class="md:hidden bg-white shadow-inner border-t">
            <div class="grid grid-cols-4 text-center">
                <a href="#" class="flex flex-col items-center py-2 text-blue-600">
                    <i class="fas fa-home text-lg"></i>
                    <span class="text-xs mt-1">Home</span>
                </a>
                <a href="#" class="flex flex-col items-center py-2 text-gray-500">
                    <i class="fas fa-calendar-alt text-lg"></i>
                    <span class="text-xs mt-1">Appointments</span>
                </a>
                <a href="#" class="flex flex-col items-center py-2 text-gray-500">
                    <i class="fas fa-file-medical text-lg"></i>
                    <span class="text-xs mt-1">Records</span>
                </a>
                
            </div>
        </div> -->

        <!-- Main Content -->
        <div class="flex-grow">
            <!-- Welcome Banner -->
            <div class="gradient-bg text-white">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="md:flex md:items-center md:justify-between">
                        <div class="flex-1 min-w-0">
                            <h1 class="text-2xl font-bold leading-tight">
                                Welcome back, Sarah
                            </h1>
                            <p class="mt-1 text-sm text-blue-100">
                                <?php echo date('l, F j, Y'); ?>
                            </p>
                        </div>
                        <div class="mt-4 flex md:mt-0 md:ml-4">
                            <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-blue-600 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Book Appointment
                            </button>
                        </div>
                    </div>
                </div>
            </div>

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
                        <div class="service-card bg-white rounded-xl shadow-sm overflow-hidden transition-all border border-gray-100">
                            <div class="h-40 bg-blue-600 flex items-center justify-center">
                                <i class="fas fa-heartbeat text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800">Cardiology</h3>
                                <p class="text-sm text-gray-600 mt-1">Expert care for heart conditions with state-of-the-art diagnostics.</p>
                                <a href="#" class="mt-3 inline-block text-blue-600 hover:text-blue-800 text-sm font-medium">Learn more →</a>
                            </div>
                        </div>
                        
                        <div class="service-card bg-white rounded-xl shadow-sm overflow-hidden transition-all border border-gray-100">
                            <div class="h-40 bg-green-600 flex items-center justify-center">
                                <i class="fas fa-brain text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800">Neurology</h3>
                                <p class="text-sm text-gray-600 mt-1">Comprehensive care for neurological disorders and conditions.</p>
                                <a href="#" class="mt-3 inline-block text-blue-600 hover:text-blue-800 text-sm font-medium">Learn more →</a>
                            </div>
                        </div>
                        
                        <div class="service-card bg-white rounded-xl shadow-sm overflow-hidden transition-all border border-gray-100">
                            <div class="h-40 bg-purple-600 flex items-center justify-center">
                                <i class="fas fa-baby text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800">Pediatrics</h3>
                                <p class="text-sm text-gray-600 mt-1">Specialized care for infants, children, and adolescents.</p>
                                <a href="#" class="mt-3 inline-block text-blue-600 hover:text-blue-800 text-sm font-medium">Learn more →</a>
                            </div>
                        </div>
                        
                        <div class="service-card bg-white rounded-xl shadow-sm overflow-hidden transition-all border border-gray-100">
                            <div class="h-40 bg-red-600 flex items-center justify-center">
                                <i class="fas fa-bone text-white text-4xl"></i>
                            </div>
                            <div class="p-4">
                                <h3 class="font-bold text-gray-800">Orthopedics</h3>
                                <p class="text-sm text-gray-600 mt-1">Treatment for bone, joint, and muscle conditions and injuries.</p>
                                <a href="#" class="mt-3 inline-block text-blue-600 hover:text-blue-800 text-sm font-medium">Learn more →</a>
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
                        <div class="doctor-card bg-white rounded-lg shadow-sm overflow-hidden transition-all border border-gray-100">
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
                                <button class="mt-4 w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition-all">
                                    Book Appointment
                                </button>
                            </div>
                        </div>
                        
                        <div class="doctor-card bg-white rounded-lg shadow-sm overflow-hidden transition-all border border-gray-100">
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
                                <button class="mt-4 w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition-all">
                                    Book Appointment
                                </button>
                            </div>
                        </div>
                        
                        <div class="doctor-card bg-white rounded-lg shadow-sm overflow-hidden transition-all border border-gray-100">
                            <div class="relative">
                                <img src="/api/placeholder/400/250" alt="Doctor" class="w-full h-48 object-cover">
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                                    <span class="inline-block px-2 py-1 bg-purple-600 text-white text-xs rounded-md">Pediatrics</span>
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
                                <button class="mt-4 w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition-all">
                                    Book Appointment
                                </button>
                            </div>
                        </div>
                        
                        <div class="doctor-card bg-white rounded-lg shadow-sm overflow-hidden transition-all border border-gray-100">
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
                                <button class="mt-4 w-full py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium transition-all">
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
                                            <img class="h-12 w-12 rounded-full object-cover border border-gray-200" src="/api/placeholder/100/100" alt="Doctor profile">
                                        </div>
                                        <div class="ml-4 flex-1">
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <h4 class="text-sm font-medium text-gray-900">Dr. Michael Carter</h4>
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
                                                    <button class="px-2 py-1 text-xs rounded border border-blue-600 text-blue-600 hover:bg-blue-50">Reschedule</button>
                                                    <button class="px-2 py-1 text-xs rounded bg-blue-600 text-white hover:bg-blue-700">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-4 hover:bg-gray-50 transition-all">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-12 w-12 rounded-full object-cover border border-gray-200" src="/api/placeholder/100/100" alt="Doctor profile">
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
                                                    <button class="px-2 py-1 text-xs rounded border border-blue-600 text-blue-600 hover:bg-blue-50">Reschedule</button>
                                                    <button class="px-2 py-1 text-xs rounded bg-blue-600 text-white hover:bg-blue-700">Confirm</button>
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
                                            <p class="text-xs text-gray-500 mt-1">Tips for maintaining a healthy heart.</p>
                                            <a href="#" class="text-xs text-blue-600 hover:text-blue-800 mt-1 inline-block">Read more →</a>
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
                                            <p class="text-xs text-gray-500