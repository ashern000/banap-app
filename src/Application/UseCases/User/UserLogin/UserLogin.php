<?php

declare(strict_types=1);

namespace src\Application\UseCases\User\UserLogin;

use src\Application\Contracts\Validator;

use src\Application\Contracts\SessionSave;

use src\Domain\Repositories\UserRepositories\LoadUserRepository;
use src\Domain\valueObjects\Email;
use src\Application\UseCases\User\UserLogin\InputBoundary;
use src\Application\UseCases\User\UserLogin\OutputBoundary;

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
        if($this->validator->validatorPassword($input->getPassword(),$emailRepository->getPassword())){
            $this->session->saveSession($emailRepository->getId());
        };

        return new OutputBoundary([
            "email" => (string)$emailRepository->getEmail(),
            "name" => (string)$emailRepository->getName(),
            "profilePic" => (string)$emailRepository->getProfilePic()
        ]);
    }
}
