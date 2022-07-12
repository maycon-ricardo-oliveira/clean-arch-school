<?php

namespace Arch\School\Academic\Domain;

interface Event
{
    public function moment(): \DateTimeImmutable;

}