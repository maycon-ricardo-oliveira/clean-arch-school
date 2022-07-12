<?php

namespace Arch\School\Tests\App;

use Arch\School\Academic\App\Student\EnrollStudent\EnrollStudent;
use Arch\School\Academic\App\Student\EnrollStudent\EnrollStudentDto;
use Arch\School\Academic\Domain\Cpf;
use Arch\School\Academic\Infra\Student\StudentRepositoryInMemory;
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