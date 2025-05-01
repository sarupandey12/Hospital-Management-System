<?php
// Connect to Database
$conn = new mysqli('localhost', 'root', '', 'hospital_db'); // change credentials accordingly

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get Data from Form
$patient_name = $_POST['patient_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$doctor = $_POST['doctor'];
$appointment_date = $_POST['appointment_date'];
$message = $_POST['message'];
$status = "Pending"; // Default status

// Insert into Appointments Table
$sql = "INSERT INTO appointments (patient_name, email, phone, doctor, appointment_date, message, status) 
        VALUES ('$patient_name', '$email', '$phone', '$doctor', '$appointment_date', '$message', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Appointment booked successfully!'); window.location.href='index.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
