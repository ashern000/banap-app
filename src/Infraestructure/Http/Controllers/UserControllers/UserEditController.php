<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\UserControllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;
use src\Application\UseCases\User\UserEdit\InputBoundary;
use src\Application\UseCases\User\UserEdit\UserEdit;
use src\Infraestructure\Http\Contracts\Controller;

final class UserEditController implements Controller
{
    private UserEdit $useCase;
    private PhpRenderer $renderer;

    public function __construct(UserEdit $useCase, PhpRenderer $renderer)
    {
        $this->useCase = $useCase;
        $this->renderer = $renderer;
    }

    public function handle(Request $request, Response $response, array $data)
    {
        $request = $request->getParsedBody();
        $input = new InputBoundary($request['id'],$request['name'],$request['password'], $request['email'], $request['profilePic']);
        $output = $this->useCase->handle($input);
        return $this->renderer->render($response, "UserEditPage.php", $data);
    }

    public function show(Request $request, Response $response, array $data)
    {
        return $this->renderer->render($response, "UserEditPage.php", $data);
    }
}
