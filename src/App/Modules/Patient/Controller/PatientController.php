<?php

namespace App\Modules\Patient\Controller;

use App\Core\ErrorHandler\JsonHandler;
use App\Model\Contact;
use App\Modules\Patient\DTO\Request\PatientCreationRequest;
use App\Modules\Patient\DTO\Request\PatientUpdateRequest;
use App\Modules\Patient\Resource\Endpoint\CreateResource;
use App\Modules\Patient\Resource\Endpoint\DeleteResource;
use App\Modules\Patient\Resource\Endpoint\FindAllResource;
use App\Modules\Patient\Resource\Endpoint\FindResource;
use App\Modules\Patient\Resource\Endpoint\UpdateResource;
use App\Modules\Patient\Resource\PatientResource;
use App\Modules\Patient\Service\PatientService;
use Framework\Controller\Controller;
use Framework\Request\Request;
use Framework\Response\JsonResource;
use Framework\Singleton\Page\Page;
use Framework\Singleton\Router\Router;

class PatientController extends Controller
{

    private readonly PatientService $patientService;
    private readonly JsonResource $patientResource;
    private readonly JsonResource $createResource;
    private readonly JsonResource $updateResource;
    private readonly JsonResource $deleteResource;
    private readonly JsonResource $findResource;
    private readonly JsonResource $findAllResource;
    public function __construct()
    {
        $this->patientService = new PatientService();
        $this->patientResource = new PatientResource();
        $this->findResource = new FindResource();
        $this->findAllResource = new FindAllResource();
        $this->createResource = new CreateResource();
        $this->updateResource = new UpdateResource();
        $this->deleteResource = new DeleteResource();
        $this->errorHandler = new JsonHandler();
    }

    public function findAll(Request $request): array
    {
        return $this->findAllResource->exportFromArray([
            "patients" => $this->patientResource->exportFromCollection($this->patientService->findAll())
        ]);
    }

    public function find(Request $request): array
    {
        return $this->findResource->exportFromArray([
            "patient" => $this->patientResource->exportFromModel($this->patientService->findById($request->id))
        ]);
    }

    public function create(Request $request): array
    {
        $createdPatient = $this->patientService->create(
            PatientCreationRequest::fromRequest($request)
        );

        return $this->createResource->exportFromArray([
            "patient" => $this->patientResource->exportFromModel($createdPatient)
        ]);
    }

    public function update(Request $request): array
    {
        $createdPatient = $this->patientService->update(
            PatientUpdateRequest::fromRequest($request)
        );

        return $this->updateResource->exportFromArray([
            "patient" => $this->patientResource->exportFromModel($createdPatient)
        ]);
    }

    public function delete(Request $request): array
    {
        $this->patientService->delete($request->id);

        return $this->deleteResource->exportFromArray(["message" => "Deletado com sucesso"]);
    }
}
