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
   
</div>

<?php
$content = ob_get_clean(); // Store content in $content
include("partials/master.php"); // Inject into master layout
?>