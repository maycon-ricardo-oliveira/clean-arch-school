<?php

namespace Arch\School\Tests\Domain\Student;

use Arch\School\Academic\Domain\Student\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testPhoneMustBeAbleToBeRepresentedAsString()
    {
        $phone = new Phone('24', '22222222');
        $this->assertSame('(24) 22222222', (string) $phone);
    }

    public function testPhoneWithInvalidMustNotExist()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('DDD is invalid');
        new Phone('ddd', '22222222');
    }

    public function testPhoneWithInvalidNumberMustNotExist()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Phone number is invalid');
        new Phone('24', 'número');
    }
}
