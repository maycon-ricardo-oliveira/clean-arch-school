<?php


namespace Alura\School\Tests;

use Alura\School\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfNumberInInvalidFormatIsNotPossible()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf('12345678910');
    }

    public function testCpfNumberSholdBeConvertToString()
    {
        $cpf = new Cpf('123.456.789-10');
    $this->assertSame('123.456.789-10', (string) $cpf);
    }

}