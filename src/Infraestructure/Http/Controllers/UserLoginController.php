<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\Application\UseCases\User\UserLogin\InputBoundary;
use src\Application\UseCases\User\UserLogin\UserLogin;

final class UserLoginController
{

    private UserLogin $userLogin;
    private Request $request;
    private Response $response;

    public function __construct(Request $request, Response $response, UserLogin $userLogin)
    {
        $this->request = $request;
        $this->response= $response;
        $this->userLogin = $userLogin;
    }

    public function handle()
    {
        $input = new InputBoundary();
        $this->userLogin->handle($input);
        $this->request->getBody();
        }
}
