<?php

declare(strict_types=1);

namespace src\infra\Http\Controllers;

use src\aplication\useCases\userLogin\UserLogin;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class UserLoginController
{

    private UserLogin $userLogin;
    private Request $request;
    private Response $response;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->response
    }

    public function handle(UserLogin $userLogin)
    {
        $this->userLogin->handle();
        $this->request->getBody();
        }
}
