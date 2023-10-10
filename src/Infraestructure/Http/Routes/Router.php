<?php

declare(strict_types=1);


return function(App $app){
    $app->group("/teste", function(){
        $this->get("",function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
            $response->getBody()->write("Hello, name");
            $json = $request->getBody();    
        });
    });
   
};