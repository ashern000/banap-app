<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require __DIR__ . "/../vendor/autoload.php";


session_start(['cookie_lifetime' => 1200, 'cookie_secure' => true, 'cookie_httponly' => true]);

/* ini_set('log_errors', 1);
error_reporting(0); */

/* $app = AppFactory::create();
$app->addErrorMiddleware(true,true,true);

require __DIR__."/../src/Infra/Http/Routes/Router.php";


$app->run();
 */

/* try {
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
  $validator = new ValidatorAdapter();
  $userCase = new UserLogin($userRepo, $session, $validator);
  $input = new InputBoundary("asherndebortoli@novells.com", '12345678', "Asher");
  $userCase->handle($input);
} catch (Exception $e) {
  echo "<h1>DEU ERROR</h1>" . $e->getMessage();
} */

/* 
try {
  $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
  $fieldRepo = new FieldRepository($pdo);
  $session = new SessionSaveAdapter();
  $fieldUseCase = new FieldCreate($fieldRepo, $session);
  $input = new FieldCreateInputBoundary(1, "Talhao Bananinhas 2", "Um talhao para bananas", 0.0, "2023-03-12", "Banana", 2, 3.1, '2023-23-02', 8.6, 6.5, 5.4, 5.3, 0);
  $fieldUseCase->handle($input);
} catch (Exception $e) {
  echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}


try {
  $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
  $fieldRepo = new FieldRepository($pdo);
  $session = new SessionSaveAdapter();
  $fieldUseCase = new FieldEdit($fieldRepo, $session);
  $input = new FieldEditInputBoundary(1,"Bananinhas Talhoines",300.3,121.21,1222.2,12213.13,322.123,3,"2023-03-20", "bananinhas", "Talhao Bananinhas 2", "2021-02-10");
  $fieldUseCase->handle($input);
} catch(Exception $e){
  echo "<h1>DEU ERROR</h1>" . $e->getMessage();
} */
/* 
try {
  $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
  $fieldRepo = new FieldRepository($pdo);
  $session = new SessionSaveAdapter();
  $fieldUseCase = new FieldDelete($fieldRepo, $session);
  $input = new FieldDeleteInputBoundary(5, 1);
  $fieldUseCase->handle($input);
} catch (Exception $e) {
  echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}
 */


/*  try {
  $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
  $userRepo = new MySQLRepo($pdo);
  $session = new SessionSaveAdapter();
  $validator = new ValidatorAdapter();
  $userCase = new UserLogin($userRepo,$session, $validator );
  $userLoginController = new UserLoginController($userCase);
 }catch(Exception $e){
  echo "Deu error: " . $e->getMessage();
 }; */



$bootstrap = require __DIR__ . "/bootstrap.php";

$app = $bootstrap['app'];
$container = $bootstrap['container'];
$app->get("/home", "HomeController:handle");
$app->post("/login", "UserLoginController:handle");
$app->any('/{any:.*}', "NotFoundController:handle");

$app->run();
