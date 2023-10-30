<?php

namespace App\Modules\Patient\Repository;

use App\Core\Repository\Repository;
use App\Model\Contact;
use App\Core\Model\Patient;
use App\Modules\Patient\DTO\Request\PatientCreationRequest;
use App\Modules\Patient\DTO\Request\PatientUpdateRequest;
use Framework\Exception\HttpException;
use Framework\Model\Collection;
use Framework\Model\Model;
use Framework\Singleton\Page\Page;
use Framework\Singleton\Router\Router;

class PatientRepository implements Repository
{
    public function __construct()
    {
    }

    public function findAll(): Collection
    {
        return Patient::all();
    }

    public function findById(int|string $id, bool $throwNotFoundException = false): Patient
    {
        return Patient::find($id, $throwNotFoundException);
    }

    public function findBy(array $comparisons, bool $throwNotFoundException = false): Patient
    {
        return Patient::findBy($comparisons, $throwNotFoundException);
    }

    public function create(object $dto): Patient
    {
        $patient = new Patient();
        $patient->name = $dto->getName();
        $patient->age = $dto->getAge();
        $patient->weight = $dto->getWeight();
        $patient->height = $dto->getHeight();
        $patient->save();

        return $patient;
    }

    public function update(Model $patient, object $dto): Patient
    {
        $patient->name = $dto->getName() ?: $patient->name;
        $patient->age = $dto->getAge() ?: $patient->age;
        $patient->weight = $dto->getWeight() ?: $patient->weight;
        $patient->height = $dto->getHeight() ?: $patient->height;
        $patient->save();

        return $patient;
    }

    public function delete(Model $patient): bool
    {
        Patient::delete($patient->id);

        return true;
    }
}
