<?php

require __DIR__ . '/../vendor/autoload.php';

use DI\Container;
use src\Infraestructure\Http\Controllers\NotFoundController;
use src\Infraestructure\Http\Controllers\HomeController;
use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use src\Application\UseCases\User\UserCreate\UserCreate;
use src\Application\UseCases\User\UserLogin\UserLogin;
use src\Infraestructure\Adapters\bcryptHashAdapter;
use src\Infraestructure\Adapters\SessionSaveAdapter;
use src\Infraestructure\Adapters\ValidatorAdapter;
use src\Infraestructure\Http\Controllers\UserLoginController;
use src\Infraestructure\Http\Controllers\UserRegistrationController;
use src\Infraestructure\Repositories\MySQL\MySQLRepo;


$container = new Container();


$container->set('UserRepository', function () {
    $settings = new PDO("mysql:host=localhost;dbname=test", "root", "");
    return new MySQLRepo($settings);
});

$container->set('Session', function () {
    return new SessionSaveAdapter();
});

$container->set('Validator', function () {
    return new ValidatorAdapter();
});

$container->set("Bcrypt", function () {
    return new bcryptHashAdapter();
});

$container->set("UserLogin", function (ContainerInterface $container) {
    $session = $container->get("Session");
    $repository = $container->get("UserRepository");
    $validator = $container->get("Validator");
    return new UserLogin($repository, $session, $validator);
});

$container->set("UserLoginController", function (ContainerInterface $container) {
    $useCase = $container->get("UserLogin");
    $renderer = $container->get("renderer");
    return new UserLoginController($useCase, $renderer);
});

$container->set('renderer', function ($container) {
    return new PhpRenderer(__DIR__ . '../../src/Infraestructure/Http/Views'); // Specify the path to your template files
});

$container->set("HomeController", function (ContainerInterface $container) {
    $renderer = $container->get("renderer");
    return new HomeController($renderer);
});

$container->set("NotFoundController", function (ContainerInterface $container) {
    $renderer = $container->get("renderer");
    return new NotFoundController($renderer);
});

$container->set("UserCreate", function (ContainerInterface $container) {
    $repository = $container->get("UserRepository");
    $bcrypt = $container->get("Bcrypt");
    return new UserCreate($repository, $bcrypt);
});

$container->set("UserRegistrationController", function (ContainerInterface $container) {
    $useCase = $container->get("UserCreate");
    $renderer = $container->get("renderer");
    return new UserRegistrationController($useCase, $renderer);
});


AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);
return ['app' => $app, 'container' => $container];
