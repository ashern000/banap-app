<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\Analysis;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use src\Application\UseCases\Analysis\LimingCalculation\InputBoundary;
use src\Domain\Repositories\AnalysisRepositories\RegisterLimingCalculation;
use src\Infraestructure\Http\Contracts\Controller;

final class RegisterLimingController implements Controller
{
    private RegisterLimingCalculation $useCase;
    private PhpRenderer $renderer;

    public function __construct(RegisterLimingCalculation $useCase, PhpRenderer $renderer)
    {
        $this->useCase = $useCase;
        $this->renderer = $renderer;
    }

    public function handle(Request $request, Response $response, array $data)
    {
        $requestData = $request->getParsedBody();
        $input = new InputBoundary($requestData['desired'], $requestData['current'], $requestData['total'], $requestData['relative']);
        
    }
}
