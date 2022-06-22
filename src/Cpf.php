<?php

namespace School;

class Cpf
{
    private string $cpfNumber;

    public function __construct(string $cpfNumber)
    {
        $this->setNumber($cpfNumber);
    }

    private function setNumber($cpfNumber): void
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if (filter_var($cpfNumber, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new \InvalidArgumentException('Format CPF number is invalid');
        }

        $this->cpfNumber = $cpfNumber;
    }

    public function __toString(): string
    {
        return $this->cpfNumber;
    }
}