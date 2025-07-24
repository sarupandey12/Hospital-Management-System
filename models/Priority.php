<?php
namespace Models;

use PDO;
require_once __DIR__ . '/../config/db.php';

class Priority
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPatientQueue()
    {
        $stmt = $this->pdo->prepare("
        SELECT p.*, pl.label AS priority_name, pl.description AS priority_description
        FROM patients p
        JOIN priority_levels pl ON p.priority = pl.priority_id
        ORDER BY p.priority ASC, p.registration_date ASC
    ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPriorities()
    {
        $stmt = $this->pdo->prepare("
        select * from priority_levels");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
