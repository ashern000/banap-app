<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\Analysis;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use src\Application\UseCases\Analysis\ListAnalysis\InputBoundary;
use src\Application\UseCases\Analysis\ListAnalysis\ListAnalysis;
use src\Infraestructure\Http\Contracts\Controller;

final class AnalysisListAllController implements Controller
{
    private PhpRenderer $renderer;
    private ListAnalysis $useCase;

    public function __construct(PhpRenderer $renderer, ListAnalysis $useCase)
    {
        $this->renderer = $renderer;
        $this->useCase = $useCase;
    }

    public function handle(Request $request, Response $response, array $args)
    {
    }

    public function show(Request $request, Response $response, array $args)
    {
        $id = (int)$args['id'][1];
        $input = new InputBoundary($id);
        $output = $this->useCase->handle($input)->getValues();
        $data = $output;
        return $this->renderer->render($response, "AnalysisList.php", $data);
    }
}
