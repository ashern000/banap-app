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
            $requestDataArray = $request->getParsedBody();
            $input = new InputBoundary($requestDataArray['email'], $requestDataArray['password'], $requestDataArray['name']);
            $output = $this->userLogin->handle($input);
            $data = ["name" => $output->getName(), "title" => "login"];
            return $this->renderer->render($response, "LoginPage.php", $data);
        } catch (Exception $e) {
            echo $response->getBody()->write("Error: " . $e->getMessage());
        }
    }

    public function show(Request $request, Response $response, array $data)
    {
        try {
            return $this->renderer->render($response, "LoginPage.php", $data);
        } catch (Exception $e) {
        }
    }
}
