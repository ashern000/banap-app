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

    public function __construct(UserLogin $userLogin)
    {
        $this->userLogin = $userLogin;
    }

    public function handle(Request $request, Response $response, array $data)
    {

        $requestDataJson = $request->getBody();
        $requestDataArray = json_decode((string)$requestDataJson, true);
        $input = new InputBoundary($requestDataArray['email'], $requestDataArray['password'], $requestDataArray['name']);
        $this->userLogin->handle($input);
        $response->getBody()->write('Hello World');
        return $response;
    }
}
