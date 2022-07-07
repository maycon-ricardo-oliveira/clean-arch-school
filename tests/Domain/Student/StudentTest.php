<?php

namespace Arch\School\Tests\Domain\Student;

use Arch\School\Domain\Student\Phone;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{


    public function testStudentWithThreePHonesMustBeNotExist()
    {
        $phone1 = new Phone('24', '22222221');
        $phone2 = new Phone('24', '22222222');
        $phone3 = new Phone('24', '22222223');

        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Phone number is invalid');
        new Phone('24', 'número');
    }

}