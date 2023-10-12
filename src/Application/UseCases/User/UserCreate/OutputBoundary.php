<?php

declare(strict_types=1);

namespace src\Application\UseCases\User\UserCreate;

final class OutputBoundary
{

    private string $name;
    private string $password;
    private string $profilePic;
    private string $email;

    public function __construct(array $values)
    {
        $this->name = $values['name'] ?? 'Error';
        $this->password = $values['password'] ?? 'Error';
        $this->profilePic = $values['profilePic'] ?? 'Error';
        $this->email = $values['email'] ?? 'Error';
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
     * Get the value of password
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Get the value of profilePic
     *
     * @return string
     */
    public function getProfilePic(): string
    {
        return $this->profilePic;
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
