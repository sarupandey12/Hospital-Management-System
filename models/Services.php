<?php
require_once __DIR__ . '/../config/db.php';

class Services
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getServices()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM services");
        $stmt->execute();

        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $services;
    }


    public function getTotalServices()
    {
        try {
            $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM services");
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? (int) $result['total'] : 0;
        } catch (PDOException $e) {
            // handle error or log it
            return 0;
        }
    }


}
?>