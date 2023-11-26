<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Controllers\Analysis;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;
use src\Application\UseCases\Analysis\LimingCalculation\InputBoundary;
use src\Application\UseCases\Analysis\LimingCalculation\LimingCalculation;
use src\Infraestructure\Http\Contracts\Controller;

final class RegisterLimingController implements Controller
{
    private LimingCalculation $useCase;
    private PhpRenderer $renderer;

    public function __construct(LimingCalculation $useCase, PhpRenderer $renderer)
    {
        $this->useCase = $useCase;
        $this->renderer = $renderer;
    }

    public function handle(Request $request, Response $response, array $args)
    {
        $id = (int)$args['id'][1];
        $requestData = $request->getParsedBody();
        $desired = 60;

        $input = new InputBoundary($desired, (float)$requestData['sb'], (float)$requestData['ctc'], (float)$requestData['prnt'], $id);
        $output = $this->useCase->handle($input);

        $needForLiming = number_format($output->getNeedForLiming(), 2);
        $sb =  $output->getCurrentBaseSaturation();
        $ctc = $output->getTotalCationExchangeCapacity();
        $prnt = $output->getRelativeTotalNeutralizingPower();

        $data = ["result" => $needForLiming, 'sb' => $sb, "ctc" => $ctc, "prnt" => $prnt, "id" => $id];

        return $this->renderer->render($response, "AnalysisResult.php", $data);
    }

    public function show(Request $request, Response $response, array $args)
    {
        $id = $args['id'];
        $data = ["id" => $id];
        return $this->renderer->render($response, "AnalysisCreate.php", $data);
    }
}
