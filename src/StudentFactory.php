<?php

namespace Arch\School;

class StudentFactory
{

    private Student $student;

    public function withNameCpfEmail(string $name, string $cpf, string $email): self
    {
        $this->student = new Student($name, new Cpf($cpf), new Email($email));
        return $this;
    }

    public function addPhone(string $ddd, string $number): self
    {
        $this->student->addPhone($ddd, $number);
        return $this;
    }

    public function __construct()
    {
    }

}