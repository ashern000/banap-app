<?php

namespace src\Domain\valueObjects;

use Exception;

class Password
{
    private string $password;

    public function __construct(string $password)
    {

        if (strlen($password) < 8) {
            return new Exception("A senha tem que ser maior que oito caracteres");
        }
        $this->password = $password;
    }

    public function __toString()
    {
        return $this->password;
    }
}
