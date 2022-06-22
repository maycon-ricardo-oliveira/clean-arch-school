<?php

namespace Arch\School;

class Student
{

    private string $name;
    private Cpf $cpf;
    private Email $email;
    private array $phones;


    public function addPhone(string $ddd, string $number)
    {
        $this->phones[] = new Phone($ddd, $number);

    }

}