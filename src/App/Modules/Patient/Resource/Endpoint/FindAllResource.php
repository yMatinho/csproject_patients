<?php

namespace App\Modules\Patient\Resource\Endpoint;

use Framework\Response\JsonResource;

class FindAllResource extends JsonResource
{

    public function __construct()
    {
    }

    public function exportFromArray(array $data): array
    {
        return [
            "status"=> true,
            "patients"=>$data["patients"]
        ];
    }
}
