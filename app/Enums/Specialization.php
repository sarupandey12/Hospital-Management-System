<?php
// src/Enums/Specialization.php
namespace App\Enums;

enum Specialization: string {
    case Cardiologist = 'Cardiologist';
    case Dermatologist = 'Dermatologist';
    case Orthopedist = 'Orthopedist';
    case Pediatrician = 'Pediatrician';
    case Neurologist = 'Neurologist';
    case GeneralPractitioner = 'General Practitioner';
    case Surgeon = 'Surgeon';
    case Dentist = 'Dentist';
    case Ophthalmologist = 'Ophthalmologist';
    case Psychiatrist = 'Psychiatrist';

    public function getLabel(): string
    {
        return ucfirst(strtolower($this->name));
    }
}

?>