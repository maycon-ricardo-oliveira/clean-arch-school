<?php

namespace Arch\School\Academic\Domain\Student;

use Arch\School\Academic\Domain\Cpf;

interface StudentRepository
{

    public function add(Student $student): void;

    public function findByCpf(Cpf $cpf): Student;

    /** @return Student[] */
    public function getAll(): array;

}


