<?php

namespace Arch\School\App\Indication;

use Arch\School\Domain\Student\Student;

interface SendIndicationMail
{

    public function sendTo(Student $indicatedStudent): void;

}