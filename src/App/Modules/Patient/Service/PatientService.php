<?php

namespace App\Modules\Patient\Service;

use App\Model\Contact;
use App\Core\Model\Patient;
use App\Core\Repository\Repository;
use App\Modules\Patient\DTO\Request\PatientCreationRequest;
use App\Modules\Patient\DTO\Request\PatientUpdateRequest;
use App\Modules\Patient\Repository\PatientRepository;
use Framework\DB\Query\Clausure\WhereComparison;
use Framework\Exception\HttpException;
use Framework\Model\Collection;
use Framework\Singleton\Page\Page;
use Framework\Singleton\Router\Router;

class PatientService
{
    private Repository $repository;
    public function __construct()
    {
        $this->repository = new PatientRepository();
    }

    public function findById(string $id): Patient
    {
        $patient = $this->repository->findById($id);
        if ($patient->isEmpty()) {
            throw new HttpException("Paciente não encontrado");
        }

        return $patient;
    }

    public function findAll(): Collection
    {
        return $this->repository->findAll();
    }

    public function create(PatientCreationRequest $dto): Patient
    {
        return $this->repository->create($dto);
    }

    public function update(PatientUpdateRequest $dto): Patient
    {
        return $this->repository->update($this->findById($dto->getPatientId()), $dto);
    }

    public function delete(int $id): void {
        $this->repository->delete($this->findById($id));
    } 
}
