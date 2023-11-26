<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\UserControllers;

use Exception;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;
use src\Application\UseCases\User\UserLogin\InputBoundary;
use src\Application\UseCases\User\UserLogin\UserLogin;
use src\Infraestructure\Adapters\SessionSaveAdapter;
use src\Infraestructure\Http\Contracts\Controller;

final class UserLoginController implements Controller
{

    private UserLogin $userLogin;
    private PhpRenderer $renderer;
    private SessionSaveAdapter $session;

    public function __construct(UserLogin $userLogin, PhpRenderer $renderer, SessionSaveAdapter $session)
    {
        $this->userLogin = $userLogin;
        $this->renderer = $renderer;
        $this->session = $session;
    }

    public function handle(Request $request, Response $response, array $args)
    {
        try {
            $requestDataArray = $request->getParsedBody();
            $input = new InputBoundary($requestDataArray['email'], $requestDataArray['password']);
            $output = $this->userLogin->handle($input);
            $data = ["name" => $output->getName(), "logged" => "true"];
            $_SESSION['name'] = $output->getName();
            return $this->renderer->render($response, "LoginPage.php", $data);
        } catch (Exception $e) {
            return $response->withHeader("Location", "/login")->withStatus(302);
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
