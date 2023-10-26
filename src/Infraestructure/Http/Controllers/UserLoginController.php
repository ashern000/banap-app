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

    public function __construct(UserLogin $userLogin)
    {
        $this->userLogin = $userLogin;
    }

    public function handle(array $data)
    {
       /*  $this->userLogin->handle($input); */
        $requestData = $this->request->getBody();
        echo $requestData;
        /* $input = new InputBoundary(); */
        $this->response->getBody()->write('Hello World');
        return $this->response;
        }
}
