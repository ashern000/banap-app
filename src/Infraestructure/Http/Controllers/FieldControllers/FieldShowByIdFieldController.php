<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\FieldControllers;

use Slim\Views\PhpRenderer;
use src\Infraestructure\Http\Contracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\Application\UseCases\Field\FieldFindById\FieldFindById;
use src\Application\UseCases\Field\FieldFindById\InputBoundary;

final class FieldShowByIdFieldController implements Controller
{
    private PhpRenderer $renderer;
    private FieldFindById $useCase;

    public function __construct(PhpRenderer $renderer, FieldFindById $useCase){
        $this->useCase = $useCase;
        $this->renderer = $renderer;
    }

    public function handle(Request $request, Response $response, array $data)
    {
    }
    public function show(Request $request, Response $response, array $args)
    {
        $id = (int)$args['id'][1];
        $input = new InputBoundary($id);

        $output = $this->useCase->handle($input);

        $nameField = $output->getName();
        $description =  $output->getDescription();
        $culture = $output->getCulture();

        $data = ["id" => $id, "nameField" => $nameField, "descriptionField" => $description, "cultureField" => $culture];

        $requestData = $request->getParsedBody();

        return $this->renderer->render($response, "FieldShowById.php", $data);
    }
}
