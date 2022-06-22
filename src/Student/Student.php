<?php

namespace Arch\School\Student;

use Arch\School\Cpf;
use Arch\School\Email;

class Student
{
    private string $name;
    private Cpf $cpf;
    private Email $email;
    private array $phones;

    public static function withCpfNameEmail(string $cpf, string $name, string $mail):self
    {
        return new Student($name, new Cpf($cpf), new Email($mail));
    }

    public function __construct(string $name, Cpf $cpf, Email $email, array $phones = [])
    {
        $this->name = $name;
        $this->cpf = $cpf;
        $this->email = $email;
        $this->phones = $phones;
    }

    public function addPhone(string $ddd, string $number)
    {
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }

}