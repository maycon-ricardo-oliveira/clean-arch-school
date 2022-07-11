<?php

namespace Arch\School\Domain;

interface Event
{
    public function moment(): \DateTimeImmutable;

}