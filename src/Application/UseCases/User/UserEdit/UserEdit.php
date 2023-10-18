<?php

declare(strict_types=1);

namespace src\Application\UseCases\User\UserEdit;

use src\Application\Contracts\Bcrypt;
use src\Application\Contracts\SessionValidator;
use src\Application\UseCases\User\UserEdit\InputBoundary;
use src\Application\UseCases\User\UserEdit\OutputBoundary;
use src\Domain\Entities\User;
use src\Domain\Repositories\UserRepositories\EditUserRepository;
use src\Domain\valueObjects\Email;
use src\Domain\valueObjects\Password;

final class UserEdit
{
    private $repository;
    private SessionValidator $session;
    private Bcrypt $bcrypt;

    public function __construct(EditUserRepository $repository, SessionValidator $session, Bcrypt $bcrypt)
    {
        $this->repository = $repository;
        $this->session = $session;
        $this->bcrypt = $bcrypt;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $this->session->sessionValidate($input->getId());

        $user = new User();
        $email = new Email($input->getEmail());
        $password = $this->bcrypt->encrypt($input->getPassword());
        $passwordHashed = new Password($password);

        $user->setName($input->getName())->setEmail($email)->setPassword($passwordHashed)->setProfilePic($input->getProfilePic());

        $userRepository = $this->repository->editUser($user);

        return new OutputBoundary(['name' => $userRepository->getName(), 'email' => (string)$userRepository->getEmail(), 'id' => $userRepository->getId(), 'profilePic' => $userRepository->getProfilePic()]);
    }
}
