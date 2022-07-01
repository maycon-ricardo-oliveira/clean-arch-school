<?php

use Arch\School\Domain\Student\Student;
use Arch\School\Infra\Student\StudentRepositoryInMemory;

require 'vendor/autoload.php';

$name = $argv[1];
$email = $argv[2];
$cpf = $argv[3];
$ddd = $argv[4];
$phone = $argv[5];

$student = Student::withCpfNameEmail($cpf, $name, $email)->addPhone($ddd, $phone);

$repository = new StudentRepositoryInMemory();
$repository->add($student);

