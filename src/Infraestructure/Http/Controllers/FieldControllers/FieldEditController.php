<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\FieldControllers;

use Slim\Views\PhpRenderer;
use src\Infraestructure\Http\Contracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\Application\UseCases\Field\FieldEdit\FieldEdit;
use src\Application\UseCases\Field\FieldEdit\InputBoundary as FieldEditInputBoundary;
use src\Application\UseCases\Field\FieldFindById\FieldFindById;
use src\Application\UseCases\Field\FieldFindById\InputBoundary;

final class FieldEditController implements Controller
{
    private FieldFindById $useCase;
    private FieldEdit $useCaseTwo;
    private PhpRenderer $renderer;
    public function __construct(FieldFindById $useCase, PhpRenderer $renderer, FieldEdit $useCaseTwo)
    {
        $this->useCase = $useCase;
        $this->renderer = $renderer;
        $this->useCaseTwo = $useCaseTwo;
    }

    public function handle(Request $request, Response $response, array $data)
    {
        $space = 0.2;

        $requestData = $request->getParsedBody();
        $id = (int)$data['id'][1];
        if (!empty($_SESSION["form-save-data-edit"])) {

            $requestDataPrevious = $_SESSION["form-save-data-edit"];

            $id = $_SESSION["session_user"];

            $input = new FieldEditInputBoundary($id, $requestDataPrevious['descricao'], $space, (float)$requestData['ponto1'], (float)$requestData['ponto2'], (float)$requestData['ponto3'], (float) $requestData['ponto4'], 2, '2022-02-20', $requestDataPrevious['cultura'], $requestDataPrevious['identificacao'], "2023-02-20");

            $output = $this->useCaseTwo->handle($input);

            $_SESSION['form-save-data-edit'] = null;

            return $response->withHeader("Location", "/user-home")->withStatus(302);
            
        } else {
            $_SESSION['form-save-data-edit'] = $requestData;
            return $this->renderer->render($response, "FieldEditTwo.php", $data);
        }
    }

    public function show(Request $request, Response $response, array $args)
    {
        $id = (int)$args['id'][1];
        $input = new InputBoundary($id);

        $output = $this->useCase->handle($input);

        $nameField = $output->getName();
        $description =  $output->getDescription();
        
        $data = ["id" => $id, "nameField"=>$nameField, "descriptionField"=>$description];
        $requestData = $request->getParsedBody();
        return $this->renderer->render($response, "FieldShowById.php", $data);
        /*     return $response->withHeader("Location", "/user-home")->withStatus(302); */
    }
}
