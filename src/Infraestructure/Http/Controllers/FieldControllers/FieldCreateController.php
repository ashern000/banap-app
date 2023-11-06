<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers;

use Slim\Views\PhpRenderer;
use src\Infraestructure\Http\Contracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

final class FieldCreateController implements Controller
{

    private PhpRenderer $renderer;
    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function handle(Request $request, Response $response, array $data)
    {
    }

    public function show(Request $request, Response $response, array $data)
    {
        return $this->renderer->render($response, "FieldPage.php", $data);
    }
}
