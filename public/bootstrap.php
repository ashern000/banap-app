<?php

require __DIR__ . '/../vendor/autoload.php';

use DI\Container;
use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;
use src\Application\UseCases\User\UserLogin\UserLogin;
use src\Infraestructure\Adapters\SessionSaveAdapter;
use src\Infraestructure\Adapters\ValidatorAdapter;
use src\Infraestructure\Http\Controllers\UserLoginController;
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

$container->set("UserLogin", function (ContainerInterface $container) {
    $session = $container->get("Session");
    $repository = $container->get("UserRepository");
    $validator = $container->get("Validator");
    return new UserLogin($repository, $session, $validator);
});

$container->set("UserLoginController", function (ContainerInterface $container) {
    $useCase = $container->get("UserLogin");
    return new UserLoginController($useCase);
});

AppFactory::setContainer($container);
$app = AppFactory::create();

$app->addErrorMiddleware(true,true,true);
return ['app' => $app, 'container' => $container];
