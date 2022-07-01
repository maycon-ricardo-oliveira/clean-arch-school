<?php

namespace Arch\School\Tests\App;

use Arch\School\App\Student\EnrollStudent\EnrollStudent;
use Arch\School\App\Student\EnrollStudent\EnrollStudentDto;
use Arch\School\Domain\Cpf;
use Arch\School\Domain\Student\Student;
use Arch\School\Infra\Student\StudentRepositoryInMemory;
use PHPUnit\Framework\TestCase;

class EnrollStudentTest extends TestCase
{

    public function testStudentMusteAbleAddToTheRepository()
    {
        $studentData = new EnrollStudentDto('123.456.789-10', "Example", "example@example.com");

        $repository = new StudentRepositoryInMemory();
        $useCase = new EnrollStudent($repository, $studentData);
        $useCase->handle($studentData);

        $student = $repository->findByCpf(new Cpf('123.456.789-10'));

        $this->assertSame('Example', (string) $student->name());
        $this->assertSame('example@example.com', (string) $student->email());
        $this->assertEmpty($student->phones());

    }

}