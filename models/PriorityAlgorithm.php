<?php
namespace Models;

use PDO;
require_once __DIR__ . '/../config/db.php';

class PriorityAlgorithm
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function getPatientsByPriority()
    {
        // Get all patients and order them by priority_id and registration_time (ascending)
        $sql = "SELECT p.*, pl.label as priority_label 
            FROM patients p
            JOIN priority_levels pl ON p.priority_id = pl.priority_id
            ORDER BY p.priority_id ASC, p.registration_time ASC";  // Ascending order for priority
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function processPatientsByPriority()
    {
        // Fetch patients based on priority
        $patients = $this->getPatientsByPriority();

        if (empty($patients)) {
            echo "No patients to process.";
            return;
        }

        // Process each patient
        foreach ($patients as $patient) {
            echo "Processing Patient: " . $patient['full_name'] . " (Priority: " . $patient['priority_label'] . ")<br>";
            // Simulate processing patient (e.g., treatment or registration)
            // This could be a call to another function that updates patient status or treatment progress
        }
    }


}
