<?php

declare(strict_types=1);

namespace src\Application\UseCases\User\UserCreate;


use src\Application\Contracts\Bcrypt;
use src\Application\UseCases\User\UserCreate\InputBoundary;
use src\Application\UseCases\User\UserCreate\OutputBoundary;
use src\Domain\Entities\User;
use src\Domain\Repositories\UserRepositories\CreateUserRepository;
use src\Domain\valueObjects\Email;
use src\Domain\valueObjects\Password;

final class UserCreate
{

    private CreateUserRepository $repository;
    private Bcrypt $bcrypt;

    public function __construct(CreateUserRepository $repository, Bcrypt $bcrypt)
    {
        $this->repository = $repository;
        $this->bcrypt = $bcrypt;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $user = new User();
        $user->setPassword(new Password($input->getPassword()));
        $email = new Email($input->getEmail());
        $passwordEncrypted = $this->bcrypt->encrypt($input->getPassword());
        $password = new Password($passwordEncrypted);
        $user->setName($input->getName())->setProfilePic($input->getProfilePic())->setPassword($password)->setEmail($email);
        $userRepository = $this->repository->create($user);

        return new OutputBoundary([
            "email" => (string)$user->getEmail(),
            "name" => $user->getName(),
            "password" => (string)$user->getPassword(),
            "profilePic" => (string)$user->getProfilePic()
        ]);
    }
}
