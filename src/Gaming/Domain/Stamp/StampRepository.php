<?php

namespace Arch\School\Gaming\Domain\Stamp;

use Arch\School\Academic\Domain\Cpf;

interface StampRepository
{

    public function add(Stamp $student): void;

    public function findStampsByStudentCpf(Cpf $cpf): Stamp;

    /** @return Stamp[] */
    public function getAll(): array;
}