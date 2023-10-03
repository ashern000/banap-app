<?php

declare(strict_types=1);

namespace src\aplication\useCases\userLogin;


use src\aplication\useCases\userLogin\OutputBoundary;
use src\aplication\contracts\SessionSave;
use src\aplication\useCases\userLogin\InputBoundary;
use src\domain\repositories\LoadUserRepository;
use src\domain\valueObjects\Email;

final class UserLogin
{
    private $userRepository;
    private $session;

    public function __construct(LoadUserRepository $userRepository, SessionSave $session)
    {
        $this->userRepository = $userRepository;
        $this->session = $session;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $email = new Email($input->getEmail());
        $emailRepository = $this->userRepository->loadByEmail($email);
        $this->session->saveSession($input->getName(), $input->getEmail());

        return new OutputBoundary([
            "email" => (string)$emailRepository->getEmail(),
            "name" => (string)$emailRepository->getName(),
            "photoPerfil" => (string)$emailRepository->getPhotoPerfil()
        ]);
    }
}
