<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\FieldControllers;

use src\Application\UseCases\Field\FieldShowByIdUser\FieldShowByIdUser;
use src\Application\UseCases\Field\FieldShowByIdUser\InputBoundary;
use Slim\Views\PhpRenderer;
use src\Infraestructure\Http\Contracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\Infraestructure\Adapters\SessionSaveAdapter;

final class FieldShowByIdUserController implements Controller
{
    private PhpRenderer $renderer;
    private FieldShowByIdUser $useCase;
    private SessionSaveAdapter $session;

    public function __construct(FieldShowByIdUser $useCase, PhpRenderer $renderer, SessionSaveAdapter $session)
    {
        $this->renderer = $renderer;
        $this->useCase = $useCase;
        $this->session = $session;
    }

    public function handle(Request $request, Response $response, array $data)
    {
        $requestData = $request->getParsedBody();
        $input = new InputBoundary($_SESSION["session_user"]);
        $output = $this->useCase->handle($input);
    }

    public function show(Request $request, Response $response, array $data)
    {
        if ($this->session->userLoggedIn()) {
            return $this->renderer->render($response, "FieldShowPage.php", $data);
        } else {
            return $response->withHeader("Location", "/")->withStatus(302);
        }
    }
}
