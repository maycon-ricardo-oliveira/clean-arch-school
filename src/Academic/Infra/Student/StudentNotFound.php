<?php

namespace Arch\School\Academic\Infra\Student;

use Arch\School\Academic\Domain\Cpf;

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