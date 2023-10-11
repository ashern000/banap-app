<?php

declare(strict_types=1);

namespace src\Application\UseCases\User\UserLogout;

final class InputBoundary {
    private string $name;
    private string $email;
    
    public  function __construct(string $name, string $email){
        $this->name = $name;
        $this->email = $email;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string {
        return $this->email;
    }
}