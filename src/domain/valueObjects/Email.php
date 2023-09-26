<?php

namespace src\domain\valueObjects;
use Exception;

class Email
{
    private string $email;

    public function __construct(string $email)
    {
        if (strlen($email) === 0) {
            return new Exception("O email não pode ser vazio");
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return new Exception("Email inválido");
        }
        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
