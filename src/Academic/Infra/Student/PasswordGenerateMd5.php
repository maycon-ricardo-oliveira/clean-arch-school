<?php

namespace Arch\School\Academic\Infra\Student;

use Arch\School\Academic\Domain\Password;

class PasswordGenerateMd5 implements Password
{

    public function encode(string $password): string
    {
        return md5($password);
    }

    public function check(string $password, string $passwordEncoded): bool
    {
        return md5($password) === $passwordEncoded;
    }
}