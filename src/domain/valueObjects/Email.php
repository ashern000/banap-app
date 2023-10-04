<?php

namespace src\domain\valueObjects;

use DomainException;
use Exception;

class Email
{
    private string $email;

    public function __construct(string $email)
    {
        if (strlen($email) === 0) {
            throw new DomainException('Email is not valid');
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new DomainException('Email is not valid');
        }
        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
