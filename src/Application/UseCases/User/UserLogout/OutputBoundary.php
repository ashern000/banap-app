<?php

declare(strict_types=1);

namespace src\Application\UseCases\User\UserLogout;

final class OutputBoundary
{
    private string $name;
    private string $email;

    public function __construct(array $values)
    {
        $this->name = $values['name'] ?? "";
        $this->email = $values['email'] ?? "";
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
}
