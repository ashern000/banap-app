<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\FieldControllers;

use Application\UseCases\Field\FieldShowByIdUser\FieldShowByIdUser;
use Application\UseCases\Field\FieldShowByIdUser\InputBoundary;
use Slim\Views\PhpRenderer;
use src\Infraestructure\Http\Contracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class FieldShowByIdUserController implements Controller
{
    private PhpRenderer $renderer;
    private FieldShowByIdUser $useCase;

    public function __construct(FieldShowByIdUser $useCase, PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->useCase = $useCase;
    }

    public function handle(Request $request, Response $response, array $data)
    {
        $requestData = $request->getParsedBody();
        $input = new InputBoundary($_SESSION["session_user"]);
        $output = $this->useCase->handle($input);

    }
}
