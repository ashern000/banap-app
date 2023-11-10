<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\UserControllers;

use Exception;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use src\Application\UseCases\User\UserCreate\InputBoundary;
use src\Application\UseCases\User\UserCreate\UserCreate;
use src\Infraestructure\Http\Contracts\Controller;

final class UserRegistrationController implements Controller
{
    private UserCreate $useCase;
    private PhpRenderer $renderer;

    public function __construct(UserCreate $useCase, PhpRenderer $renderer)
    {
        $this->useCase = $useCase;
        $this->renderer = $renderer;
    }

    public function handle(Request $request, Response $response, array $data)
    {
        try {
            $requestDataArray = $request->getParsedBody();
            $input = new InputBoundary($requestDataArray['email'], $requestDataArray['senha'], $requestDataArray['nome'], "saddasdasdsa");
            $output = $this->useCase->handle($input);
            $data = ['created' => "true", "name" => $output->getName()];
            return $this->renderer->render($response, "RegistrationPage.php", $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function show(Request $request, Response $response, array $data)
    {
        try {
            return $this->renderer->render($response, "RegistrationPage.php", $data);
        } catch (Exception $e) {
        }
    }
}
