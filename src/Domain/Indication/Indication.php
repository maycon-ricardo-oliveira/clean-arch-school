<?php

namespace Arch\School\Domain\Indication;

use Arch\School\Domain\Student\Student;

class Indication
{
    private  Student  $indicated;
    private  Student  $indicator;
    private  \DateTimeImmutable $date;

    public function __construct(Student $indicated, Student $indicator)
    {
        $this->indicated = $indicated;
        $this->indicator = $indicator;

        $this->date = new \DateTimeImmutable();
    }

}