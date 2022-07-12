<?php


namespace Arch\School\Tests\Domain;

use Arch\School\Academic\Domain\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfNumberInInvalidFormatIsNotPossible()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf('12345678910');
    }

    public function testCpfMustBeAbleToBeRepresentedAsString()
    {
        $cpf = new Cpf('123.456.789-10');
        $this->assertSame('123.456.789-10', (string) $cpf);
    }

}