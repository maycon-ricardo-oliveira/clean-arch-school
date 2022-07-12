<?php

namespace Arch\School\Domain\Student;

use Arch\School\Domain\Cpf;
use Arch\School\Domain\Email;
use Arch\School\Domain\Password;

class Student
{
    private string $name;
    private Cpf $cpf;
    private Email $email;
    private array $phones;
    private Password $password;


    public static function withCpfNameEmail(string $cpf, string $name, string $mail): self
    {
        return new Student($name, new Cpf($cpf), new Email($mail));
    }

    public function __construct(string $name, Cpf $cpf, Email $email)
    {
        $this->name = $name;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->phones = [];
    }

    public function addPhone(string $ddd, string $number)
    {
        if (count($this->phones) === 2) {
            throw new \DomainException('Is not possible create more with two phones');
        }

        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }

    public function cpf(): Cpf
    {
        return $this->cpf;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function phones(): array
    {
        return $this->phones;
    }

}