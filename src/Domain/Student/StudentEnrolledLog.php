<?php

namespace Arch\School\Domain\Student;

use Arch\School\Domain\Event;
use Arch\School\Domain\EventSubscriber;

class StudentEnrolledLog extends EventSubscriber
{

    /** @param EnrolledStudent  $event */
    public function reactFrom(Event $event): void
    {

        fprintf(STDERR, "Student with CPF %s went enrolled on date %s",
            (string) $event->getStudentCpf(),
            $event->moment()->format('d/m/Y')
        );

    }

    public function knowProcess(Event $event): bool
    {
        return $event instanceof EnrolledStudent;
    }

}