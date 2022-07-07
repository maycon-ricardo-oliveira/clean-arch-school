<?php

namespace Arch\School\Tests\Domain\Student;

use Arch\School\Domain\Cpf;
use Arch\School\Domain\Email;
use Arch\School\Domain\Student\Phone;
use Arch\School\Domain\Student\Student;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{

    public Student $student;

    public function setUp(): void
    {
        $this->student = new Student(
            'Maycon',
            $this->createStub(Cpf::class),
            $this->createStub(Email::class),
        );
    }

    public function testStudentWithTwoMorePhonesMustBeExcepction()
    {
        $this->expectException(\DomainException::class);

        $this->student->addPhone('24', '22222221');
        $this->student->addPhone('24', '22222222');
        $this->student->addPhone('24', '22222223');
    }

    public function testAddOnePhoneMustBeWork()
    {
        $this->student->addPhone('24', '22222221');
        $this->assertCount(1, $this->student->phones());
    }

    public function testAddTwoPhoneMustBeWork()
    {
        $this->student->addPhone('24', '22222221');
        $this->student->addPhone('24', '22222222');
        $this->assertCount(2, $this->student->phones());
    }

}