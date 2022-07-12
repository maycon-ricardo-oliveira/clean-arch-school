<?php

namespace Arch\School\Gaming\Domain\Stamp;

use Arch\School\Academic\Domain\Cpf;

class Stamp
{
    private Cpf $studentCpf;
    private  string $name;

    /**
     * @param Cpf $studentCpf
     * @param string $name
     */
    public function __construct(Cpf $studentCpf, string $name)
    {
        $this->studentCpf = $studentCpf;
        $this->name = $name;
    }

    public function studentCpf(): Cpf
    {
        return $this->studentCpf;
    }

    public function name(): string
    {
        return $this->name;
    }

}