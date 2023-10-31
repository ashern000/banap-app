<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
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
        $input = new InputBoundary($request[""]);
        $output = $this->useCase->handle();
    }

    public function show(Request $request, Response $response, array $data)
    {
    }
}
