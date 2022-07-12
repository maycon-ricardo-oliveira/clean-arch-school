<?php

namespace Arch\School\Academic\Infra\Student;

use Arch\School\Academic\Domain\Password;

class PasswordGeneratePhp implements Password
{

    public function encode(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    public function check(string $password, string $passwordEncoded): bool
    {
        return password_verify($password, $passwordEncoded);
    }
}