<?php

declare(strict_types=1);

namespace src\aplication\useCases\userLogin;

final class OutputBoundary
{
    private string $name;
    private string $photoPerfil;
    private string $email;


    public function __construct(array $values)
    {
        $this->name = $values['name'] ?? 'Error';
        $this->photoPerfil = $values['photoPerfil'] ?? 'Error';
        $this->email = $values['email'] ?? 'Error';
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function getPhotoPerfil(): string
    {
        return $this->photoPerfil;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}
