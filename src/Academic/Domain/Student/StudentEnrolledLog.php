<?php

namespace Arch\School\Academic\Domain\Student;

use Arch\School\Academic\Domain\Event;
use Arch\School\Academic\Domain\EventSubscriber;

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