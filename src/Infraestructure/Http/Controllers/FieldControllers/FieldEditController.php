<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\FieldControllers;

use Slim\Views\PhpRenderer;
use src\Application\UseCases\Field\FieldEdit\FieldEdit;
use src\Infraestructure\Http\Contracts\Controller;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use src\Application\UseCases\Field\FieldFindById\FieldFindById;
use src\Application\UseCases\Field\FieldFindById\InputBoundary;

final class FieldEditController implements Controller
{
    private FieldFindById $useCase;
    private PhpRenderer $renderer;
    public function __construct(FieldFindById $useCase, PhpRenderer $renderer)
    {
        $this->useCase = $useCase;
        $this->renderer = $renderer;
    }

    public function handle(Request $request, Response $response, array $data)
    {
        
    }

    public function show(Request $request, Response $response, array $data)
    {
        $id = (int)$data['id'][1];
        $input = new InputBoundary($id);
        $this->useCase->handle($input);
        return $this->renderer->render($response, "FieldEditPage.php", $data);
    }
}
