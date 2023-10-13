<?php

declare(strict_types=1);

namespace src\Application\UseCases\User\UserEdit;

final class OutputBoundary
{
    private int $id;
    private string $name;
    private string $email;
    private string $profilePic;

    public function __construct(array $values)
    {
        $this->name = $values['name'] ?? '';
        $this->email = $values['email'] ?? '';
        $this->id = $values['id'] ?? '';
        $this->profilePic = $values['profilePic'] ?? '';
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
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }
}
