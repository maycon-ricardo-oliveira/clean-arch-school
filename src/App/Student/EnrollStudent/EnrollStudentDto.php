<?php

namespace Arch\School\App\Student\EnrollStudent;

class EnrollStudentDto
{

    public string $cpfStudent;
    public string $nameStudent;
    public string $emailStudent;

    /**
     * @param string $cpfStudent
     * @param string $nameStudent
     * @param string $emailStudent
     */
    public function __construct(string $cpfStudent, string $nameStudent, string $emailStudent)
    {
        $this->cpfStudent = $cpfStudent;
        $this->nameStudent = $nameStudent;
        $this->emailStudent = $emailStudent;
    }


}