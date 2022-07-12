<?php

namespace Arch\School\Academic\Domain;

interface Password
{
    public function encode(string $password): string;

    public function check(string $password, string $passwordEncoded): bool;
}