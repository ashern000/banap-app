<?php

namespace src\Domain\valueObjects;

use DomainException;

class Password
{
    private string $password;

    public function __construct(string $password)
    {

        if (strlen($password) < 8) {
            throw new DomainException("A senha tem que ser maior que oito caracteres");
        }
        $this->password = $password;
    }

    public function __toString()
    {
        return $this->password;
    }
}
