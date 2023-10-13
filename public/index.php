<?php

require __DIR__ . "/../vendor/autoload.php";


session_start(['cookie_lifetime' => 1200, 'cookie_secure' => true, 'cookie_httponly' => true]);

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use src\Application\UseCases\User\UserEdit\InputBoundary;
use src\Application\UseCases\User\UserEdit\UserEdit;
use src\Infraestructure\Adapters\bcryptHashAdapter;
use src\Infraestructure\Adapters\SessionSaveAdapter;
use src\Infraestructure\Adapters\ValidatorAdapter;
use src\Infraestructure\repositories\MySQL\MySQLRepo;

/* $app = AppFactory::create();
$app->addErrorMiddleware(true,true,true);

require __DIR__."/../src/Infra/Http/Routes/Router.php";


$app->run();
 */

try {
  $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
  $userRepo = new MySQLRepo($pdo);
  $session = new SessionSaveAdapter();
  $bcrypt = new bcryptHashAdapter();
  $useCase = new UserEdit($userRepo, $session, $bcrypt);
  $input = new InputBoundary('1', "Asher", "12345678", "asherndebortoli@gmail.com", "alksdjlkasdjlkjsadlkdasj");
  $useCase->handle($input);
} catch (Exception $e) {
  echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}
