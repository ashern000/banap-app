<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Factory\AppFactory;

return function(App $app){
    $app->group("/teste", function(){
        $this->get("",function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
            $response->getBody()->write("Hello, name");
            $json = $request->getBody();    
        });
    });
   
};