<?php

declare(strict_types=1);

namespace src\aplication\useCases\userLogin;

final class InputBoundary
{
    private string $email;
    private string $password;

    private string $name;

    public function __construct(string $email, string $password, string $name)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getName()
    {
        return $this->name;
    }
}
