<?php
require_once(__DIR__ . "/../models/Priority.php");

use Models\Priority;


$priorityModal = new Priority($pdo);

$priorities = $priorityModal->getAllPriority();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System - Patient Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .custom-dropdown {
            position: relative;
            width: 100%;
        }

        .dropdown-selected {
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            user-select: none;
        }

        .dropdown-list {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: none;
            max-height: 200px;
            overflow-y: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .dropdown-item {
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: relative;
            /* Needed for the description box positioning */
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        .priority-description {
            position: absolute;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            display: none;
            color: #333;
            padding: 5px;
            max-width: 250px;
            width: auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 20;
        }
    </style>
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
                        <label for="full_name" class="block text-gray-700 font-medium mb-2">Full Name <span
                                class="text-red-500">*</span></label>
                        <input id="full_name" name="full_name" type="text" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border <?php echo isset($_GET['full_name_error']) ? 'border-red-500' : ''; ?>"
                            value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>">
                        <?php if (isset($_GET['full_name_error'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($_GET['full_name_error']); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email Address <span
                                class="text-red-500">*</span></label>
                        <input id="email" name="email" type="email" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border <?php echo isset($_GET['email_error']) ? 'border-red-500' : ''; ?>"
                            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                        <?php if (isset($_GET['email_error'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($_GET['email_error']); ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number <span
                                class="text-red-500">*</span></label>
                        <input id="phone" name="phone" type="text" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border <?php echo isset($_GET['phone_error']) ? 'border-red-500' : ''; ?>"
                            value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
                        <?php if (isset($_GET['phone_error'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($_GET['phone_error']); ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="gender" class="block text-gray-700 font-medium mb-2">Gender <span
                                class="text-red-500">*</span></label>
                        <select id="gender" name="gender" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border <?php echo isset($_GET['gender_error']) ? 'border-red-500' : ''; ?>">
                            <option value="">Select Gender</option>
                            <option value="Male" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                        </select>
                        <?php if (isset($_GET['gender_error'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($_GET['gender_error']); ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="priority" class="block text-gray-700 font-medium mb-2">Priority <span
                                class="text-red-500">*</span></label>
                        <div class="custom-dropdown">
                            <div class="dropdown-selected" id="selected-priority">
                                <?php echo isset($_POST['priority']) ? htmlspecialchars($_POST['priority']) : 'Select priority'; ?>
                            </div>
                            <ul class="dropdown-list">
                                <?php foreach ($priorities as $priority): ?>
                                    <li class="dropdown-item"
                                        data-description="<?= htmlspecialchars($priority['description']) ?>"
                                        data-value="<?= $priority['priority_id'] ?>">
                                        <?= htmlspecialchars($priority['label']) ?>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <input type="hidden" name="priority" id="priority"
                            value="<?php echo isset($_POST['priority']) ? htmlspecialchars($_POST['priority']) : ''; ?>">
                        <div id="priority-description" class="priority-description"></div>
                        <?php if (isset($_GET['priority_error'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($_GET['priority_error']); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="blood_group" class="block text-gray-700 font-medium mb-2">Blood Group</label>
                        <select id="blood_group" name="blood_group"
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border">
                            <option value="">Select Blood Group</option>
                            <option value="A+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'A+') ? 'selected' : ''; ?>>A+</option>
                            <option value="A-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'A-') ? 'selected' : ''; ?>>A-</option>
                            <option value="B+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'B+') ? 'selected' : ''; ?>>B+</option>
                            <option value="B-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'B-') ? 'selected' : ''; ?>>B-</option>
                            <option value="O+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'O+') ? 'selected' : ''; ?>>O+</option>
                            <option value="O-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'O-') ? 'selected' : ''; ?>>O-</option>
                            <option value="AB+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'AB+') ? 'selected' : ''; ?>>AB+</option>
                            <option value="AB-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] == 'AB-') ? 'selected' : ''; ?>>AB-</option>
                        </select>
                    </div>

                    <div>
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password <span
                                class="text-red-500">*</span></label>
                        <input id="password" name="password" type="password" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border <?php echo isset($_GET['password_error']) ? 'border-red-500' : ''; ?>">
                        <?php if (isset($_GET['password_error'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($_GET['password_error']); ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-gray-700 font-medium mb-2">Confirm Password
                            <span class="text-red-500">*</span></label>
                        <input id="confirm_password" name="confirm_password" type="password" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border <?php echo isset($_GET['confirm_password_error']) ? 'border-red-500' : ''; ?>">
                        <?php if (isset($_GET['confirm_password_error'])): ?>
                            <p class="text-red-500 text-sm mt-1">
                                <?php echo htmlspecialchars($_GET['confirm_password_error']); ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="md:col-span-2">
                        <label for="address" class="block text-gray-700 font-medium mb-2">Address <span
                                class="text-red-500">*</span></label>
                        <textarea id="address" name="address" rows="3" required
                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50 py-2 px-3 border <?php echo isset($_GET['address_error']) ? 'border-red-500' : ''; ?>"><?php echo isset($_POST['address']) ? htmlspecialchars($_POST['address']) : ''; ?></textarea>
                        <?php if (isset($_GET['address_error'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?php echo htmlspecialchars($_GET['address_error']); ?></p>
                        <?php endif; ?>
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const selectedPriority = document.getElementById('selected-priority');
            const priorityInput = document.getElementById('priority');
            const descriptionBox = document.getElementById('priority-description');
            const dropdownList = document.querySelector('.dropdown-list');
            const dropdownItems = document.querySelectorAll('.dropdown-item');

            // Show or hide the dropdown when clicked
            selectedPriority.addEventListener('click', function () {
                dropdownList.style.display = dropdownList.style.display === 'block' ? 'none' : 'block';
            });

            // Set value and description on hover
            dropdownItems.forEach(function (item) {
                item.addEventListener('mouseover', function () {
                    descriptionBox.style.display = 'block';
                    descriptionBox.innerHTML = item.getAttribute('data-description');

                    // Position the description box near the hovered item
                    const rect = item.getBoundingClientRect();
                    const descriptionRect = descriptionBox.getBoundingClientRect();

                    const spaceAbove = rect.top; // Space available above the item
                    const spaceBelow = window.innerHeight - rect.bottom; // Space below the item

                    // Display description above or below based on available space
                    if (spaceBelow > descriptionRect.height) {
                        descriptionBox.style.top = `${rect.bottom + window.scrollY + 5}px`; // Position below
                    } else {
                        descriptionBox.style.top = `${rect.top + window.scrollY - descriptionRect.height - 5}px`; // Position above
                    }

                    descriptionBox.style.left = `${rect.left}px`; // Align with left of the hovered item
                });

                item.addEventListener('click', function () {
                    selectedPriority.innerText = item.innerText;
                    priorityInput.value = item.getAttribute('data-value');
                    descriptionBox.style.display = 'none';
                    dropdownList.style.display = 'none';
                });
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (event) {
                if (!event.target.closest('.custom-dropdown')) {
                    dropdownList.style.display = 'none';
                }
            });
        });


    </script>
</body>

</html>