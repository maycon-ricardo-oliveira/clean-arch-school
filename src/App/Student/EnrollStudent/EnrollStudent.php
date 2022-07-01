<?php

namespace Arch\School\App\Student\EnrollStudent;

use Arch\School\Domain\Student\Student;
use Arch\School\Domain\Student\StudentRepository;
use Arch\School\Infra\Student\StudentRepositoryInMemory;

class EnrollStudent
{

    private StudentRepository $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;


    }

    public function handle(EnrollStudentDto $data)
    {

        $student = Student::withCpfNameEmail(
            $data->cpfStudent,
            $data->nameStudent,
            $data->emailStudent
        );

        $this->repository->add($student);
    }
}