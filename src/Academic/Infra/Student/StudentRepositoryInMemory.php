<?php

namespace Arch\School\Academic\Infra\Student;

use Arch\School\Academic\Domain\Cpf;
use Arch\School\Academic\Domain\Student\Student;
use Arch\School\Academic\Domain\Student\StudentRepository;

class StudentRepositoryInMemory implements StudentRepository
{

    private  array $students = [];

    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function findByCpf(Cpf $cpf): Student
    {
        $filtered = array_filter($this->students, function (Student $student) use ($cpf) {
            return $student->cpf() == $cpf;
        });

        if (count($filtered) === 0) {
            throw new StudentNotFound($cpf);
        }

        if (count($filtered) > 1) {
            throw new \Exception("Students duplicateds");
        }

        return $filtered[0];
    }

    public function getAll(): array
    {
        return $this->students;
    }
}