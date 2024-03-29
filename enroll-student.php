<?php

use Arch\School\Academic\App\Student\EnrollStudent\EnrollStudent;
use Arch\School\Academic\App\Student\EnrollStudent\EnrollStudentDto;
use Arch\School\Academic\Domain\EventPubllisher;
use Arch\School\Academic\Domain\Student\Student;
use Arch\School\Academic\Domain\Student\StudentEnrolledLog;
use Arch\School\Academic\Infra\Student\StudentRepositoryInMemory;

require 'vendor/autoload.php';

$name = $argv[2];
$email = $argv[3];
$cpf = $argv[1];

$student = Student::withCpfNameEmail($cpf, $name, $email);

$repository = new StudentRepositoryInMemory();
$repository->add($student);

$eventPubllisher = new EventPubllisher();
$eventPubllisher->addSubscriber(new StudentEnrolledLog());
$useCase = new EnrollStudent(new StudentRepositoryInMemory(), $eventPubllisher);
$useCase->handle(new EnrollStudentDto($cpf, $name, $email));


