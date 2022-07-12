<?php

namespace Arch\School\Gaming\Infra\Stamp;

use Arch\School\Academic\Domain\Cpf;
use Arch\School\Gaming\Domain\Stamp\Stamp;
use Arch\School\Gaming\Domain\Stamp\StampRepository;

class StampRepositoryInMemory implements StampRepository
{

    private  array $stamps = [];

    public function add(Stamp $student): void
    {
        $this->stamps[] = $student;
    }

    public function findStampsByStudentCpf(Cpf $cpf): Stamp
    {
        $filtered = array_filter($this->stamps, function (Stamp $stamp) use ($cpf) {
            return $stamp->studentCpf() == $cpf;
        });

        if (count($filtered) === 0) {
            throw new \Exception("Stamp not found");
        }

        if (count($filtered) > 1) {
            throw new \Exception("Stamps duplicateds");
        }

        return $filtered[0];
    }

    public function getAll(): array
    {
        return $this->stamps;
    }
}