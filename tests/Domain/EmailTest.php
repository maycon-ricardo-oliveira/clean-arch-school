<?php

namespace Arch\School\Tests\Domain;

use Arch\School\Academic\Domain\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailInInvalidFormatMustNotBeAbleToExist()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('Email is Invalid');
    }

    public function testEmailMustBeAbleToBeRepresentedAsAString()
    {
        $email = new Email('example@example.com');
        $this->assertSame('example@example.com', (string) $email);
    }
}
