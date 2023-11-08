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
        $requestData = $request->getParsedBody();
        $idUser = $_SESSION['session_user'];
        $plantsPerField = 1;
        $centralPoint = 0;

        $input = new InputBoundary($idUser, $requestData['name'], $requestData['description'], $requestData['space'],$requestData['whenRegistered'],$requestData['culture'],$plantsPerField, $centralPoint, $requestData['lastDay'], $requestData['pointOne'], $requestData['pointTwo'], $requestData['pointThree'], $requestData['pointFour'],$requestData['analysis']);

        $output = $this->useCase->handle($input);
        return $this->renderer->render($response, "FieldPage.php", $data);

    }

    public function show(Request $request, Response $response, array $data)
    {
        if($this->session->userLoggedIn()){
        return $this->renderer->render($response, "FieldPage.php", $data);
    }else{
        return $response->withHeader("Location", "/")->withStatus(302);
    }
    }
}
