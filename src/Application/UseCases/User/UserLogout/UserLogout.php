<?php

declare(strict_types=1);

namespace src\Application\UseCases\User\UserLogout;

use src\Application\Contracts\SessionLogout;


final class UserLogout
{
    private SessionLogout $session;

    public function __construct(SessionLogout $session)
    {
        $this->session = $session;
    }


    public function handle(InputBoundary $input): OutputBoundary
    {
        $this->session->logout($input->getName());

        return new OutputBoundary([]);
    }
}
