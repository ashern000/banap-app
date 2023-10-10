<?php

declare(strict_types=1);

namespace src\Application\UseCases\UserCreate;

use src\Application\Contracts\Bcrypt;
use src\Application\UseCases\UserCreate\InputBoundary;
use src\Application\UseCases\UserCreate\OutputBoundary;
use src\Domain\Entities\User;
use src\Domain\Repositories\LoadUserRepositories\CreateUserRepository;
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
        $email = new Email($input->getEmail());
        $passwordEncrypted = $this->bcrypt->encrypt($input->getPassword());
        $password = new Password($passwordEncrypted);
        $user = new User();
        $user->setName($input->getName())->setProfilePic($input->getProfilePic())->setPassword($password)->setEmail($email);
        $userRepository = $this->repository->create($user);

        return new OutputBoundary([
            "email" => $userRepository->getEmail(),
            "name" => $userRepository->getName(),
            "password" => $userRepository->getPassword(),
            "profilePic" => $userRepository->getProfilePic()
        ]);
    }
}
