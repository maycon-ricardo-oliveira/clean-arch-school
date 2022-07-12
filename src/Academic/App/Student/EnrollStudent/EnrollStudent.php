<?php

namespace Arch\School\Academic\App\Student\EnrollStudent;

use Arch\School\Academic\Domain\EventPubllisher;
use Arch\School\Academic\Domain\Student\EnrolledStudent;
use Arch\School\Academic\Domain\Student\Student;
use Arch\School\Academic\Domain\Student\StudentEnrolledLog;
use Arch\School\Academic\Domain\Student\StudentRepository;

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