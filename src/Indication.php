<?php

namespace Arch\School;

class Indication
{
    private  Student  $indicated;
    private  Student  $indicator;

    public function __construct(Student $indicated, Student $indicator)
    {
        $this->indicated = $indicated;
        $this->indicator = $indicator;
    }

}