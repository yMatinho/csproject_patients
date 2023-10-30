<?php

namespace App\Modules\Patient\Resource;

use Framework\Response\JsonResource;

class PatientResource extends JsonResource
{

    public function __construct()
    {
    }

    public function exportFromArray(array $data): array
    {
        return [
            "id"=> isset($data["id"]) ? $data["id"] : null,
            "name"=>$data["name"],
            "age"=>$data["age"],
            "weight"=>$data["weight"],
            "height"=>$data["height"],
            "createdAt"=> isset($data["created_at"]) ? $data["created_at"] : null,
            "updatedAt"=> isset($data["updated_at"]) ? $data["updated_at"] : null,
        ];
    }
}
