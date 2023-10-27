<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;
use src\Application\UseCases\User\UserLogin\InputBoundary;
use src\Application\UseCases\User\UserLogin\UserLogin;
use src\Infraestructure\Http\Contracts\Controller;

final class UserLoginController implements Controller
{

    private UserLogin $userLogin;
    private PhpRenderer $renderer;

    public function __construct(UserLogin $userLogin, PhpRenderer $renderer)
    {
        $this->userLogin = $userLogin;
        $this->renderer = $renderer;
    }

    public function handle(Request $request, Response $response, array $data)
    {
        try {
            $requestDataJson = $request->getBody();
            $requestDataArray = json_decode((string)$requestDataJson, true);
            $input = new InputBoundary($requestDataArray['email'], $requestDataArray['password'], $requestDataArray['name']);
            $output = $this->userLogin->handle($input);
            $response->getBody()->write("Bem vindo " . $output->getName());
            $data = ["name" => $output->getName(), "title" => "login"];
            return $this->renderer->render($response, "home.php", $data);
        } catch (Exception $e) {
            echo $response->getBody()->write("Error: " . $e->getMessage());
        }
    }
}
