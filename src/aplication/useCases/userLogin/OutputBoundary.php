<?php

declare(strict_types=1);

namespace src\aplication\useCases\userLogin;

final class OutputBoundary
{
    private string $name;
    private string $profilePic;
    private string $email;


    public function __construct(array $values)
    {
        $this->name = $values['name'] ?? 'Error';
        $this->profilePic = $values['profilePic'] ?? 'Error';
        $this->email = $values['email'] ?? 'Error';
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getProfilePic(): string
    {
        return $this->profilePic;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
