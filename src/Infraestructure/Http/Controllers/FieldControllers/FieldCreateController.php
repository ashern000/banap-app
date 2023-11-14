<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\FieldControllers;

use Slim\Views\PhpRenderer;
use src\Infraestructure\Http\Contracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\Application\UseCases\Field\FieldCreate\FieldCreate;
use src\Application\UseCases\Field\FieldCreate\InputBoundary;
use src\Infraestructure\Adapters\SessionSaveAdapter;

final class FieldCreateController implements Controller
{
    private FieldCreate $useCase;
    private PhpRenderer $renderer;
    private SessionSaveAdapter $session;
    public function __construct(PhpRenderer $renderer, FieldCreate $useCase, SessionSaveAdapter $session)
    {
        $this->renderer = $renderer;
        $this->useCase = $useCase;
        $this->session = $session;
    }

    public function handle(Request $request, Response $response, array $data)
    {
        $idUser = $_SESSION['session_user'];
        $plantsPerField = 1;
        $centralPoint = 0;
        $lastDay = '2022-02-20';
        $when = '2023-11-09';
        $analysis = 1;
        $space = 1;

        $requestData = $request->getParsedBody();
        if (!empty($_SESSION["form-save-data"])) {
            $requestDataPrevious = $_SESSION["form-save-data"];
            $input = new InputBoundary($idUser, $requestDataPrevious['identificacao'], $requestDataPrevious['descricao'], $space, $when, $requestDataPrevious['cultura'], $plantsPerField, $centralPoint, $lastDay, (float)$requestData['ponto1'], (float)$requestData['ponto2'], (float)$requestData['ponto3'], (float)$requestData['ponto4'], $analysis);
            $output = $this->useCase->handle($input);
            $_SESSION['form-save-data'] = null;
        } else {
            $_SESSION['form-save-data'] = $requestData;
            return $this->renderer->render($response, "FieldCreateSecond.php", $data);
        }
        return $response->withHeader("Location", "/user-home")->withStatus(302);
    }

    public function show(Request $request, Response $response, array $data)
    {
        if ($this->session->userLoggedIn()) {
            return $this->renderer->render($response, "FieldCreate.php", $data);
        } else {
            return $response->withHeader("Location", "/")->withStatus(307);
        }
    }
}
