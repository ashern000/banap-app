<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers;


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\PhpRenderer;
use src\Infraestructure\Http\Contracts\Controller;

final class HomeController implements Controller
{
    private PhpRenderer $renderer;
    public function __construct(PhpRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function handle(Request $request, Response $response, array $args)
    {
        $data = ["title" => "Home"];
        return $this->renderer->render($response, "home.php", $data);
    }

    public function show(Request $request, Response $response, array $args)
    {
    }
}
