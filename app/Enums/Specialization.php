<?php
namespace Enums;

enum Specialization: string
{
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

    // You can also add methods if needed, like for validation or display
    public function getLabel(): string
    {
        return ucfirst(strtolower($this->name));
    }
}
?>
