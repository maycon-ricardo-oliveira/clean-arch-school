<?php

use Arch\School\App\Student\EnrollStudent\EnrollStudent;
use Arch\School\App\Student\EnrollStudent\EnrollStudentDto;
use Arch\School\Domain\EventPubllisher;
use Arch\School\Domain\Student\Student;
use Arch\School\Domain\Student\StudentEnrolledLog;
use Arch\School\Infra\Student\StudentRepositoryInMemory;

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


