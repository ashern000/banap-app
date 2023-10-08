<?php

declare(strict_types=1);

namespace src\Application\Contracts;

interface Bcrypt {
    public function encrypt(string $password):string;
}

?>