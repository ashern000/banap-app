<?php

use src\Domain\Entities\Analysis;

require __DIR__ . "/../vendor/autoload.php";


session_start(['cookie_lifetime' => 1200, 'cookie_secure' => true, 'cookie_httponly' => true]);

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\AppFactory;
use src\Application\UseCases\Field\FieldCreate\FieldCreate;
use src\Application\UseCases\Field\FieldCreate\InputBoundary as FieldCreateInputBoundary;
use src\Application\UseCases\User\UserCreate\InputBoundary as UserCreateInputBoundary;
use src\Application\UseCases\User\UserCreate\UserCreate;
use src\Application\UseCases\User\UserEdit\UserEdit;
use src\Application\UseCases\User\UserLogin\InputBoundary;
use src\Application\UseCases\User\UserLogin\UserLogin;
use src\Infraestructure\Adapters\bcryptHashAdapter;
use src\Infraestructure\Adapters\SessionSaveAdapter;
use src\Infraestructure\Adapters\ValidatorAdapter;
use src\Infraestructure\Repositories\MySQL\FieldRepository;
use src\Infraestructure\repositories\MySQL\MySQLRepo;

/* $app = AppFactory::create();
$app->addErrorMiddleware(true,true,true);

require __DIR__."/../src/Infra/Http/Routes/Router.php";


$app->run();
 */

try {
  $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
  $userRepo = new MySQLRepo($pdo);
  $bcrypt = new bcryptHashAdapter();
  $userCase = new UserCreate($userRepo, $bcrypt);
  $input = new UserCreateInputBoundary("asherndebortoli@novells.com", "12345678", "Asher Novelli", "sadsdsadsdsaadsasd");
  $userCase->handle($input);
} catch (Exception $e) {
  echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}

try {
  $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
  $userRepo = new MySQLRepo($pdo);
  $bcrypt = new bcryptHashAdapter();
  $session = new SessionSaveAdapter();
  echo $_SESSION["session_user"];
  $validator = new ValidatorAdapter();
  $userCase = new UserLogin($userRepo, $session, $validator);
  $input = new InputBoundary("asherndebortoli@novells.com", '12345678', "Asher");
  $userCase->handle($input);
} catch (Exception $e) {
  echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}


try {
  $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
  $fieldRepo = new FieldRepository($pdo);
  $session = new SessionSaveAdapter();
  $fieldUseCase = new FieldCreate($fieldRepo, $session);
  $input = new FieldCreateInputBoundary(1, "", "", 0, new DateTime(), "Banana", 2, 3.1, new DateTime(), 8.6, 6.5, 5.4, 5.3, new Analysis());
  $fieldUseCase->handle($input);
} catch (Exception $e) {
  echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}
