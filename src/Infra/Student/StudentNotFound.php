<?php

namespace Arch\School\Infra\Student;

use Arch\School\Domain\Cpf;

class StudentNotFound extends \DomainException
{

    /**
     * @param Cpf $cpf
     */
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Student with CPF $cpf not found!");
    }
}