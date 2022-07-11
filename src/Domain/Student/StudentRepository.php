<?php

namespace Arch\School\Domain\Student;

use Arch\School\Domain\Cpf;

interface StudentRepository
{

    public function add(Student $student): void;

    public function findByCpf(Cpf $cpf): Student;

    /** @return Student[] */
    public function getAll(): array;

}


