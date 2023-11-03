<?php

declare(strict_types=1);

namespace src\Infraestructure\Http\Contracts;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

interface Controller
{
    public function handle(Request $request, Response $response, array $data);
    public function show(Request $request, Response $response, array $data);
}
