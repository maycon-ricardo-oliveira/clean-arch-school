<?php

namespace Arch\School\Domain\Student;

use Arch\School\Domain\Cpf;
use Arch\School\Domain\Event;

class EnrolledStudent implements Event
{
    private \DateTimeImmutable $moment;
    private Cpf $studentCpf;

    public function __construct(Cpf $studentCpf)
    {
        $this->moment = new \DateTimeImmutable();
        $this->studentCpf = $studentCpf;
    }

    /**
     * @return Cpf
     */
    public function getStudentCpf(): Cpf
    {
        return $this->studentCpf;
    }


    public function moment(): \DateTimeImmutable
    {
        return $this->moment;
    }
}