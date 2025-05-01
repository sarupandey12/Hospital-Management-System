<?php
require_once(__DIR__ . "/header.php"); // Safe path reference
?>

<!-- Main Layout Body -->
<div class="p-6">
  <?php
    if (isset($content)) {
      echo $content; // Inject child page content here
    }
  ?>
</div>

<?php
require_once(__DIR__ . "/footer.php");
?>
