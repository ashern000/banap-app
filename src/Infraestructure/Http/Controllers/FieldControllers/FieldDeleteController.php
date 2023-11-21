<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\FieldControllers;

use Slim\Views\PhpRenderer;
use src\Application\UseCases\Field\FieldDelete\FieldDelete;
use src\Application\UseCases\Field\FieldDelete\InputBoundary;
use src\Infraestructure\Http\Contracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class FieldDeleteController implements Controller
{
    private FieldDelete $useCase;
    private PhpRenderer $renderer;
    public function __construct(FieldDelete $useCase, PhpRenderer $renderer)
    {
        $this->useCase = $useCase;
        $this->renderer = $renderer;
    }

    public function handle(Request $request, Response $response, array $args)
    {
        $id = (int)$args['id'];
        $idUser = $_SESSION["session_user"];
        $input = new InputBoundary($id);
        $output = $this->useCase->handle($input);
        $data = ["data"=>$output];
        return $response->withHeader("Location", "/user-home")->withStatus(302);
    }

    public function show(Request $request, Response $response, array $args)
    {
    }
}
