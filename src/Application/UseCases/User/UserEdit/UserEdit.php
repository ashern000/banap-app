<?php

declare(strict_types=1);

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
    private EditUserRepository $repository;
    private SessionValidator $session;
    private Bcrypt $bcrypt;

    public function __construct(SessionValidator $session, EditUserRepository $repository, Bcrypt $bcrypt)
    {
        $this->repository = $repository;
        $this->session = $session;
        $this->bcrypt = $bcrypt;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $this->session->sessionValidate($input->getName(), $input->getEmail());
        $user = new User();
        $email = new Email($input->getEmail());
        $password = $this->bcrypt->encrypt($input->getPassword());
        $passwordHashed = new Password($password);
        $user->setName($input->getName())->setEmail($email)->setPassword($passwordHashed)->setProfilePic($input->getProfilePic());
        $userRepository = $this->repository->editUser($user);

        return new OutputBoundary([]);
    }
}
