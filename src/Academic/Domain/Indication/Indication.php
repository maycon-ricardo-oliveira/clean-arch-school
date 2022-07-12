<?php

namespace Arch\School\Academic\Domain\Indication;

use Arch\School\Academic\Domain\Student\Student;

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