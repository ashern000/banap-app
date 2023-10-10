<?php

require __DIR__ . "/../vendor/autoload.php";


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use src\Infra\Repositories\MySQL\MySQLRepo;
use Slim\Factory\AppFactory;
use src\Application\UseCases\UserCreate\InputBoundary as UserCreateInputBoundary;
use src\Application\UseCases\UserLogin\InputBoundary;
use src\Application\UseCases\UserCreate\UserCreate;
use src\Application\UseCases\UserLogin\UserLogin;
use src\Infra\Adapters\bcryptHashAdapter;
use src\Infra\Adapters\SessionSaveAdapter;
use src\Infra\Adapters\ValidatorAdapter;

session_start(['cookie_lifetime' => 1200, 'cookie_secure' => true, 'cookie_httponly' => true]);

/* $app = AppFactory::create();
$app->addErrorMiddleware(true,true,true);

require __DIR__."/../src/Infra/Http/Routes/Router.php";


$app->run();
 */

try {
    $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
    $userRepo = new MySQLRepo($pdo);
    $bcrypt = new bcryptHashAdapter();
  /*   $session = new SessionSaveAdapter();
    $validator = new ValidatorAdapter();
    $userUseCase = new UserLogin($userRepo, $session, $validator);
    $input = new InputBoundary("asherndebortoli@gmail.com.br","12345678", "Asher Novelli", "asdsaadsdasasd");
    $userUseCase->handle($input); */

    $userUseCaseCreate = new UserCreate($userRepo, $bcrypt);
    $inputCreate = new UserCreateInputBoundary("asherndebortoli@hotmail.com", "123456789", "Asher", "rekldsalçkçsdakçdsa");
    $userUseCaseCreate->handle($inputCreate);

} catch (Exception $e) {
    echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}
