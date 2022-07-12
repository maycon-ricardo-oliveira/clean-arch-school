<?php

namespace Arch\School\Academic\App\Indication;

use Arch\School\Academic\Domain\Student\Student;

interface SendIndicationMail
{

    public function sendTo(Student $indicatedStudent): void;

}