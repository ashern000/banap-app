<?php

require __DIR__ . "/../vendor/autoload.php";


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use src\aplication\useCases\userLogin\InputBoundary;
use src\aplication\useCases\userLogin\UserLogin;
use src\infra\adapters\SessionSaveAdapter;
use src\infra\repositories\MySQL\MySQLRepo;
use Slim\Factory\AppFactory;


session_start(['cookie_lifetime' => 1200, 'cookie_secure' => true, 'cookie_httponly' => true]);


$app = AppFactory::create();

$app->get('/', function (ServerRequestInterface $request, ResponseInterface $response, array $args) {
    $response->getBody()->write("Hello, name");
    $json = $request->getBody();
    $tet= json_decode($json);
    var_dump($tet);

    return $response;
});

$app->run();
/* 
try {
    $pdo = new PDO("mysql:host=localhost;dbname=db_like", "root", "");
    $userRepo = new MySQLRepo($pdo);
    $sessionSaver = new SessionSaveAdapter();
    $userUseCase = new UserLogin($userRepo, $sessionSaver);
    $input = new InputBoundary("asherndebortoli@gmail.com", "12345678", "asher");
    $output = $userUseCase->handle($input);
} catch (Exception $e) {
    echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}
 */