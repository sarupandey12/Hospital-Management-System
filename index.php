<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCore - Advanced Hospital Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .floating-card {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .pulse-dot {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .slide-in-left {
            animation: slideInLeft 1s ease-out;
        }

        .slide-in-right {
            animation: slideInRight 1s ease-out;
        }

        @keyframes slideInLeft {
            from { transform: translateX(-100px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        @keyframes slideInRight {
            from { transform: translateX(100px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-scale:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .feature-card {
            transition: all 0.3s ease;
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            background: linear-gradient(145deg, #f0f0f0, #ffffff);
        }

        .stats-counter {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .btn-primary:hover::before {
            left: 0;
        }

        .medical-icon {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .testimonial-card {
            background: linear-gradient(145deg, #ffffff, #f8fafc);
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .stats-counter {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-heartbeat text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">MediCore</span>
                </div>
                
                <div class="hidden md:flex space-x-8">
                    <a href="#features" class="nav-link text-gray-700 hover:text-blue-600">Features</a>
                    <a href="#about" class="nav-link text-gray-700 hover:text-blue-600">About</a>
                    <a href="#testimonials" class="nav-link text-gray-700 hover:text-blue-600">Testimonials</a>
                    <a href="#contact" class="nav-link text-gray-700 hover:text-blue-600">Contact</a>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="patients" class="hidden md:block text-gray-700 hover:text-blue-600 transition-colors">Sign In</a>
                    <a href="#getstarted" class="btn-primary text-white px-6 py-2 rounded-full hover:shadow-lg">Get Started</a>
                </div>

                <button class="md:hidden text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-20 pb-16 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="slide-in-left">
                    <div class="inline-flex items-center space-x-2 bg-blue-50 text-blue-600 px-4 py-2 rounded-full text-sm font-medium mb-6">
                        <span class="pulse-dot w-2 h-2 bg-blue-600 rounded-full"></span>
                        <span>Next-Gen Healthcare Technology</span>
                    </div>
                    
                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                        Transform Your 
                        <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Hospital</span> 
                        Management
                    </h1>
                    
                    <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                        Streamline operations, enhance patient care, and boost efficiency with our comprehensive hospital management system. Built for modern healthcare providers.
                    </p>
                    
                    <!-- <div class="flex flex-col sm:flex-row gap-4 mb-12">
                        <button class="btn-primary text-white px-8 py-4 rounded-full text-lg font-semibold hover:shadow-xl">
                            Start Free Trial
                        </button>
                        <button class="flex items-center justify-center space-x-2 text-gray-700 px-8 py-4 rounded-full border-2 border-gray-300 hover:border-blue-500 hover:text-blue-600 transition-all">
                            <i class="fas fa-play-circle text-xl"></i>
                            <span class="font-semibold">Watch Demo</span>
                        </button>
                    </div> -->

                    <div class="grid grid-cols-3 gap-8">
                        <div class="text-center">
                            <div class="stats-counter">500+</div>
                            <p class="text-gray-600 font-medium">Hospitals</p>
                        </div>
                        <div class="text-center">
                            <div class="stats-counter">1M+</div>
                            <p class="text-gray-600 font-medium">Patients</p>
                        </div>
                        <div class="text-center">
                            <div class="stats-counter">99.9%</div>
                            <p class="text-gray-600 font-medium">Uptime</p>
                        </div>
                    </div>
                </div>

                <div class="slide-in-right relative">
                    <div class="floating-card relative z-10 bg-white rounded-3xl shadow-2xl p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-900">Patient Dashboard</h3>
                            <div class="flex space-x-2">
                                <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3 p-3 bg-blue-50 rounded-lg">
                                <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user-md text-white"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Dr. Sarah Johnson</p>
                                    <p class="text-sm text-gray-600">Cardiology • Available</p>
                                </div>
                                <div class="ml-auto">
                                    <span class="w-3 h-3 bg-green-400 rounded-full inline-block pulse-dot"></span>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-4 rounded-lg">
                                    <div class="text-2xl font-bold text-green-600">156</div>
                                    <div class="text-sm text-gray-600">Active Patients</div>
                                </div>
                                <div class="bg-gradient-to-r from-blue-50 to-cyan-50 p-4 rounded-lg">
                                    <div class="text-2xl font-bold text-blue-600">24</div>
                                    <div class="text-sm text-gray-600">Appointments</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Elements -->
                    <div class="absolute -top-4 -right-4 w-20 h-20 bg-gradient-to-r from-pink-400 to-red-400 rounded-full opacity-20 animate-pulse"></div>
                    <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full opacity-10"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Powerful Features for Modern Healthcare</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Everything you need to manage your hospital efficiently, from patient records to staff scheduling.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card p-8 rounded-2xl hover-scale">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-user-injured text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Patient Management</h3>
                    <p class="text-gray-600">Comprehensive patient records, medical history, and real-time monitoring with intuitive dashboard.</p>
                </div>

                <div class="feature-card p-8 rounded-2xl hover-scale">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-calendar-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Appointment Scheduling</h3>
                    <p class="text-gray-600">Smart scheduling system with automated reminders and conflict resolution for optimal time management.</p>
                </div>

                <div class="feature-card p-8 rounded-2xl hover-scale">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-file-medical text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Electronic Health Records</h3>
                    <p class="text-gray-600">Secure, digital health records with easy access and sharing capabilities for healthcare providers.</p>
                </div>

                <div class="feature-card p-8 rounded-2xl hover-scale">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-money-bill text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Billing & Insurance</h3>
                    <p class="text-gray-600">Automated billing processes with insurance claim management and payment tracking.</p>
                </div>

                <div class="feature-card p-8 rounded-2xl hover-scale">
                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Analytics & Reports</h3>
                    <p class="text-gray-600">Comprehensive analytics dashboard with customizable reports for data-driven decisions.</p>
                </div>

                <div class="feature-card p-8 rounded-2xl hover-scale">
                    <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-green-500 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Security & Compliance</h3>
                    <p class="text-gray-600">HIPAA-compliant security measures with end-to-end encryption and access controls.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Trusted by Healthcare Leaders</h2>
                <p class="text-xl text-gray-600">See what medical professionals are saying about MediCore</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="testimonial-card p-8 rounded-2xl">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=60&h=60&fit=crop&crop=face" alt="Dr. Michael Chen" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Dr. Michael Chen</h4>
                            <p class="text-gray-600 text-sm">Chief Medical Officer</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">"MediCore has revolutionized how we manage our hospital operations. The efficiency gains are remarkable, and patient satisfaction has increased significantly."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card p-8 rounded-2xl">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1594824475317-7d6cc20a4e3b?w=60&h=60&fit=crop&crop=face" alt="Dr. Sarah Williams" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Dr. Sarah Williams</h4>
                            <p class="text-gray-600 text-sm">Hospital Administrator</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">"The implementation was seamless, and the support team is exceptional. Our staff productivity has improved by 40% since adopting MediCore."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card p-8 rounded-2xl">
                    <div class="flex items-center mb-6">
                        <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=60&h=60&fit=crop&crop=face" alt="Dr. James Rodriguez" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-bold text-gray-900">Dr. James Rodriguez</h4>
                            <p class="text-gray-600 text-sm">Emergency Department Head</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">"In emergency situations, every second counts. MediCore's intuitive interface and quick access to patient data has been life-saving."</p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 gradient-bg">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-white mb-6">Ready to Transform Your Hospital?</h2>
            <p class="text-xl text-white/90 mb-8">Join thousands of healthcare providers who trust MediCore to streamline their operations and improve patient care.</p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <button class="bg-white text-gray-900 px-8 py-4 rounded-full text-lg font-semibold hover:bg-gray-100 transition-colors hover-scale">
                    Start Free Trial
                </button>
                <button class="glass-effect text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-white/20 transition-colors">
                    Schedule Demo
                </button>
            </div>

            <p class="text-white/70 mt-6 text-sm">No credit card required • 30-day free trial • Setup in minutes</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div class="col-span-2">
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-heartbeat text-white text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold">MediCore</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-md">Empowering healthcare providers with cutting-edge technology for better patient care and operational efficiency.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Product</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Features</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Security</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Integrations</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition-colors">Documentation</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Help Center</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Status</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">© 2025 MediCore. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navigation
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('bg-white/95');
                nav.classList.remove('bg-white/80');
            } else {
                nav.classList.add('bg-white/80');
                nav.classList.remove('bg-white/95');
            }
        });

        // Animate counters when they come into view
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.textContent.replace(/\D/g, ''));
                    const suffix = counter.textContent.replace(/[0-9]/g, '');
                    let current = 0;
                    const increment = target / 50;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        counter.textContent = Math.floor(current) + suffix;
                    }, 40);
                    observer.unobserve(counter);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.stats-counter').forEach(counter => {
            observer.observe(counter);
        });

        // Add hover effects to feature cards
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    </script>
</body>
</html>