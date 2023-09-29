<?php

use src\aplication\useCases\userLogin\InputBoundary;
use src\domain\valueObjects\Email;

class UserLogin
{
    private $userRepository;

    public function __construct(LoadUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(InputBoundary $input): OutputBoundary
    {
        $email = new Email($input->getEmail());
        $emailRepository = $this->userRepository->loadByEmail($email);

        return new OutputBoundary([
            "email"=>(string)$emailRepository->getEmail(),
            "name"=>(string)$emailRepository->getName(),
            "photoPerfil"=>(string)$emailRepository->getPhotoPerfil()
        ]);

        
    }
}
