<?php

namespace App\Modules\Patient\Resource\Endpoint;

use Framework\Response\JsonResource;

class DeleteResource extends JsonResource
{

    public function __construct()
    {
    }

    public function exportFromArray(array $data): array
    {
        return [
            "status"=> true,
            "message"=>$data["message"]
        ];
    }
}
