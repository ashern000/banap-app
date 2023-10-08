<?php

require __DIR__ . "/../vendor/autoload.php";


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use src\Application\UseCases\UserLogin\InputBoundary;
use src\Application\UseCases\UserLogin\UserLogin;
use src\Infra\Adapters\SessionSaveAdapter;
use src\Infra\Repositories\MySQL\MySQLRepo;
use Slim\Factory\AppFactory;
use src\Infra\Adapters\ValidatorAdapter;

session_start(['cookie_lifetime' => 1200, 'cookie_secure' => true, 'cookie_httponly' => true]);

/* $app = AppFactory::create();
$app->addErrorMiddleware(true,true,true);

require __DIR__."/../src/Infra/Http/Routes/Router.php";


$app->run(); */

try {
    $pdo = new PDO("mysql:host=localhost;dbname=db_like", "root", "");
    $userRepo = new MySQLRepo($pdo);
    $sessionSaver = new SessionSaveAdapter();
    $validator = new ValidatorAdapter();
    $userUseCase = new UserLogin($userRepo, $sessionSaver, $validator);
    $input = new InputBoundary("asherndebortoli@gmail.com", "12345678", "asher");
    $output = $userUseCase->handle($input);
} catch (Exception $e) {
    echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}
