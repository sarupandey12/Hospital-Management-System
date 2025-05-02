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

    /**
     * Get the priority label by ID.
     */
    public function getLabelById(int $priorityId): ?string
    {
        $stmt = $this->pdo->prepare("SELECT label FROM priority_levels WHERE priority_id = :priorityId");
        $stmt->execute(['priorityId' => $priorityId]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['label'] : null;
    }

    /**
     * Get full priority details by ID.
     */
    public function getDetailsById(int $priorityId): ?array
    {
        $stmt = $this->pdo->prepare("SELECT label, description FROM priority_levels WHERE priority_id = :priorityId");
        $stmt->execute(['priorityId' => $priorityId]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    /**
     * Get all priority levels.
     *
     * @return array
     */
    public function getAllPriority(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM priority_levels ORDER BY priority_id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
