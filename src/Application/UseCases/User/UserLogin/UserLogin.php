<?php

declare(strict_types=1);

namespace src\Application\UseCases\UserLogin;

use src\Application\Contracts\Validator;
use src\Application\UseCases\UserLogin\OutputBoundary;
use src\Application\Contracts\SessionSave;
use src\Application\useCases\userLogin\InputBoundary;
use src\Domain\Repositories\UserRepositories\LoadUserRepository;
use src\Domain\valueObjects\Email;

final class UserLogin
{
    private $userRepository;
    private $session;
    private $validator;

    public function __construct(LoadUserRepository $userRepository, SessionSave $session, Validator $validator)
    {
        $this->userRepository = $userRepository;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $email = new Email($input->getEmail());
        $emailRepository = $this->userRepository->loadByEmail($email);
        $this->validator->validatorPassword($input->getPassword(),$emailRepository->getPassword());
        $this->session->saveSession($input->getName(), $input->getEmail());

        return new OutputBoundary([
            "email" => (string)$emailRepository->getEmail(),
            "name" => (string)$emailRepository->getName(),
            "profilePic" => (string)$emailRepository->getProfilePic()
        ]);
    }
}
