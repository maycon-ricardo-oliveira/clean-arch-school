<?php

namespace Arch\School\Tests;

use Arch\School\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testTelefoneDevePoderSerRepresentadoComoString()
    {
        $phone = new Phone('24', '22222222');
        $this->assertSame('(24) 22222222', (string) $phone);
    }

    public function testTelefoneComDddInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('DDD inválido');
        new Phone('ddd', '22222222');
    }

    public function testTelefoneComNumeroInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectDeprecationMessage('Número de telefone inválido');
        new Phone('24', 'número');
    }
}
