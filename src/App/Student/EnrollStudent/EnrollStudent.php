<?php

namespace Arch\School\App\Student\EnrollStudent;

use Arch\School\Domain\EventPubllisher;
use Arch\School\Domain\Student\EnrolledStudent;
use Arch\School\Domain\Student\Student;
use Arch\School\Domain\Student\StudentEnrolledLog;
use Arch\School\Domain\Student\StudentRepository;
use Arch\School\Infra\Student\StudentRepositoryInMemory;

class EnrollStudent
{

    private StudentRepository $repository;
    private EventPubllisher $eventEmiter;

    public function __construct(StudentRepository $repository, EventPubllisher $eventPubllisher)
    {
        $this->repository = $repository;
        $this->eventEmiter = $eventPubllisher;
        $this->eventEmiter->addSubscriber(new StudentEnrolledLog());

    }

    public function handle(EnrollStudentDto $data)
    {

        $student = Student::withCpfNameEmail(
            $data->cpfStudent,
            $data->nameStudent,
            $data->emailStudent
        );

        $this->repository->add($student);
        $this->eventEmiter->notify(new EnrolledStudent($student->cpf()));
    }
}