<?php

declare(strict_types=1);

namespace src\Application\UseCases\User\UserEdit;

final class InputBoundary
{
    private int $id;
    private string $name;
    private string $password;
    private string $email;
    private string $profilePic;

    public function __construct(int $id, string $name, string $password, string $email, string $profilePic)
    {
        $this->name = $name;
        $this->id = $id;
        $this->password = $password;
        $this->email = $email;
        $this->profilePic = $profilePic;
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
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }
}
