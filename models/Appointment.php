<?php
require_once __DIR__ . '/../config/db.php';

class Appointment
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function getTotalAppointmentsByPatient($patientId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM appointments WHERE patient_id = :patientId");
            $stmt->bindParam(':patientId', $patientId, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? (int) $result['total'] : 0;
        } catch (PDOException $e) {
            // handle error or log it
            return 0;
        }
    }


    public function getPatientAppointments($id)
    {
        try {
            $stmt = $this->pdo->prepare("
            SELECT 
                a.*, 
                s.name AS service_name, 
                p.label AS priority_label, 
                p.description AS priority_description,
                pt.full_name AS patient_name
            FROM appointments a
            LEFT JOIN services s ON a.service_id = s.id
            LEFT JOIN priority_levels p ON a.priority_id = p.priority_id
            LEFT JOIN patients pt ON a.patient_id = pt.id
            WHERE a.patient_id = :id
            ORDER BY a.appointment_date DESC
        ");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error or handle accordingly
            return [];
        }
    }


    public function getAllAppointments()
    {
        try {
            $stmt = $this->pdo->prepare("
            SELECT 
                a.*, 
                s.name AS service_name, 
                p.label AS priority_label, 
                p.description AS priority_description,
                pt.full_name AS patient_name,
                pt.gender AS patient_gender,
                pt.phone AS patient_phone,
                d.full_name AS doctor_name
            FROM appointments a
            LEFT JOIN services s ON a.service_id = s.id
            LEFT JOIN priority_levels p ON a.priority_id = p.priority_id
            LEFT JOIN patients pt ON a.patient_id = pt.id
            LEFT JOIN doctors d ON a.doctor_id = d.id
            ORDER BY a.appointment_date DESC, a.created_at DESC
        ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // You may log this error in production
            return [];
        }
    }




    public function storeAppointment(array $data)
    {
        $sql = "INSERT INTO appointments 
            (patient_id, doctor_id, service_id, priority_id, appointment_date, appointment_time, reason, status, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $this->pdo->prepare($sql);

        // You need to provide doctor_id, appointment_time, status in $data or set defaults here
        return $stmt->execute([
            $data['patient_id'],
            $data['doctor_id'] ?? null,          // assuming doctor_id may be optional
            $data['service_id'],
            $data['priority_id'],               // use 'prioritiy_id' exactly
            $data['appointment_date'],
            $data['appointment_time'] ?? null,  // if you have time field
            $data['reason'],
            $data['status'] ?? 'pending'         // default status if not provided
        ]);
    }


}
?>