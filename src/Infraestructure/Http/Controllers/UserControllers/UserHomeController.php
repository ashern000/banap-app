<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\UserControllers;

use Slim\Views\PhpRenderer;
use src\Application\UseCases\Field\FieldShowByIdUser\FieldShowByIdUser;
use src\Infraestructure\Http\Contracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\Application\UseCases\Field\FieldShowByIdUser\InputBoundary;
use src\Infraestructure\Adapters\SessionSaveAdapter;

final class UserHomeController implements Controller
{
    private PhpRenderer $renderer;
    private FieldShowByIdUser $useCase;
    private SessionSaveAdapter $session;


    public function __construct(PhpRenderer $renderer, FieldShowByIdUser $useCase, SessionSaveAdapter $session)
    {
        $this->renderer = $renderer;
        $this->useCase = $useCase;
        $this->session = $session;
    }

    public function handle(Request $request, Response $response, array $args)
    {
        if ($this->session->userLoggedIn()) {
            $input = new InputBoundary($_SESSION['session_user']);
            $output = $this->useCase->handle($input);
            $data = ['order' => $output->getData(), 'name' => $_SESSION['name']];
            return $this->renderer->render($response, 'UserHome.php', $data);
        } else {
            return $response->withHeader("Location", "/login")->withStatus(302);
        }
    }

    public function show(Request $request, Response $response, array $args)
    {
        $input = new InputBoundary($_SESSION['session_user']);
        $this->useCase->handle($input);
        $data = [];
        return $this->renderer->render($response, 'UserHome.php', $data);
    }
}
