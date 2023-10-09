<?php

require __DIR__ . "/../vendor/autoload.php";


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use src\Infra\Repositories\MySQL\MySQLRepo;
use Slim\Factory\AppFactory;
use src\Application\UseCases\UserCreate\UserCreate;;
use src\Infra\Adapters\BcryptHashAdapter;
use src\Infra\Adapters\ValidatorAdapter;

session_start(['cookie_lifetime' => 1200, 'cookie_secure' => true, 'cookie_httponly' => true]);

/* $app = AppFactory::create();
$app->addErrorMiddleware(true,true,true);

require __DIR__."/../src/Infra/Http/Routes/Router.php";


$app->run(); */

try {
    $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
    $userRepo = new MySQLRepo($pdo);
    $bcrypt = new BcryptHashAdapter();
    $userUseCase = new UserCreate($userRepo, $bcrypt);
} catch (Exception $e) {
    echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}
