<?php

namespace App\Modules\Patient\DTO\Request;

use Framework\Request\Request;

class PatientUpdateRequest
{

    public function __construct(
        private int $patientId,
        private string $name,
        private int $age,
        private int $height,
        private float $weight,
    ) {
    }

    public static function fromRequest(Request $data): PatientUpdateRequest
    {
        return new PatientUpdateRequest(
            $data->id,
            $data->name,
            $data->age,
            $data->height,
            $data->weight
        );
    }

    public function getPatientId(): int
    {
        return $this->patientId;
    }

    public function getName(): string
    {
        return $this->name;
    }
    
    public function getAge(): int
    {
        return $this->age;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }
}
