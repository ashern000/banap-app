<?php

require_once __DIR__ . '/../vendor/autoload.php';

use DI\Container;

use src\Infraestructure\Http\Controllers\FieldControllers\FieldCreateController;
use src\Infraestructure\Http\Controllers\NotFoundController;
use src\Infraestructure\Http\Controllers\HomeController;
use Psr\Container\ContainerInterface;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use src\Application\UseCases\Analysis\LimingCalculation\LimingCalculation;
use src\Application\UseCases\Field\FieldCreate\FieldCreate;
use src\Application\UseCases\Field\FieldEdit\FieldEdit;
use src\Application\UseCases\Field\FieldFindById\FieldFindById;
use src\Application\UseCases\Field\FieldShowByIdUser\FieldShowByIdUser;
use src\Application\UseCases\User\UserCreate\UserCreate;
use src\Application\UseCases\User\UserEdit\UserEdit;
use src\Application\UseCases\User\UserLogin\UserLogin;
use src\Infraestructure\Adapters\bcryptHashAdapter;
use src\Infraestructure\Adapters\SessionSaveAdapter;
use src\Infraestructure\Adapters\ValidatorAdapter;
use src\Infraestructure\Http\Controllers\Analysis\AnalisysController;
use src\Infraestructure\Http\Controllers\Analysis\RegisterLimingController;
use src\Infraestructure\Http\Controllers\FieldControllers\FieldEditController;
use src\Infraestructure\Http\Controllers\FieldControllers\FieldShowByIdUserController;
use src\Infraestructure\Http\Controllers\UserControllers\UserEditController;
use src\Infraestructure\Http\Controllers\UserControllers\UserHomeController;
use src\Infraestructure\Http\Controllers\UserControllers\UserLoginController;
use src\Infraestructure\Http\Controllers\UserControllers\UserRegistrationController;
use src\Infraestructure\Repositories\MySQL\AnalysisRepository;
use src\Infraestructure\Repositories\MySQL\FieldRepository;
use src\Infraestructure\Repositories\MySQL\MySQLRepo;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;

const config = "mysql:host=localhost;dbname=BanapDB";
const user = "root";
const password = "";

$container = new Container();

$container->set('UserRepository', function () {
    $settings = new PDO(config, user, password);
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
    $session = $container->get("Session");
    return new UserLoginController($useCase, $renderer, $session);
});

$container->set('renderer', function ($container) {
    return new PhpRenderer(__DIR__ . '../../src/Infraestructure/Http/Views');
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

$container->set("UserEdit", function (ContainerInterface $container) {
    $repository = $container->get("UserRepository");
    $session = $container->get("Session");
    $bcrypt = $container->get("Bcrypt");
    return new UserEdit($repository, $session, $bcrypt);
});

$container->set("UserRegistrationController", function (ContainerInterface $container) {
    $useCase = $container->get("UserCreate");
    $renderer = $container->get("renderer");
    return new UserRegistrationController($useCase, $renderer);
});

$container->set("UserEditController", function (ContainerInterface $container) {
    $useCase = $container->get("UserEdit");
    $session = $container->get("Session");
    $renderer = $container->get("renderer");
    return new UserEditController($useCase, $renderer, $session);
});

$container->set("FieldRepository", function (ContainerInterface $container) {
    $settings = new PDO(config, user, password);
    return new FieldRepository($settings);
});

$container->set("FieldCreate", function (ContainerInterface $container) {
    $repository = $container->get("FieldRepository");
    $session = $container->get("Session");
    return new FieldCreate($repository, $session);
});

$container->set("FieldCreateController", function (ContainerInterface $container) {
    $renderer = $container->get("renderer");
    $useCase = $container->get("FieldCreate");
    $session = $container->get("Session");
    return new FieldCreateController($renderer, $useCase, $session);
});

$container->set("AnalisysController", function (ContainerInterface $container) {
    $renderer = $container->get("renderer");
    return new AnalisysController($renderer);
});

$container->set("FieldShowByIdUser", function (ContainerInterface $container) {
    $repository = $container->get("FieldRepository");
    $session = $container->get("Session");
    return new FieldShowByIdUser($repository, $session);
});

$container->set("FieldShowByIdUserController", function (ContainerInterface $container) {
    $renderer = $container->get("renderer");
    $useCase = $container->get("FieldShowByIdUser");
    $session = $container->get("Session");
    return new FieldShowByIdUserController($useCase, $renderer, $session);
});

$container->set("LimingRepository", function (ContainerInterface $container) {
    $settings = new PDO(config, user, password);
    return new AnalysisRepository($settings);
});

$container->set("LimingCalculation", function (ContainerInterface $container) {
    $repository = $container->get("LimingRepository");
    return new LimingCalculation($repository);
});

$container->set("RegisterLimingController", function (ContainerInterface $container) {
    $useCase = $container->get("LimingCalculation");
    $renderer = $container->get("renderer");
    return new RegisterLimingController($useCase, $renderer);
});

$container->set("FieldShowByIdUser", function (ContainerInterface $container) {
    $repository = $container->get("FieldRepository");
    $session = $container->get("Session");
    return new FieldShowByIdUser($repository, $session);
});

$container->set("UserHomeController", function (ContainerInterface $container) {
    $useCase = $container->get("FieldShowByIdUser");
    $renderer = $container->get("renderer");
    $session = $container->get("Session");
    return new UserHomeController($renderer, $useCase, $session);
});

$container->set("FieldFindById", function (ContainerInterface $container) {
    $repository = $container->get("FieldRepository");
    $session = $container->get("Session");
    return new FieldFindById($repository, $session);
});

$container->set("FieldEdit", function (ContainerInterface $container) {
    $repository = $container->get("FieldRepository");
    $session = $container->get("Session");
    return new FieldEdit($repository, $session);
});

$container->set("FieldEditController", function (ContainerInterface $container) {
    $useCase = $container->get("FieldFindById");
    $useCaseTwo = $container->get("FieldEdit");
    $renderer = $container->get("renderer");
    return new FieldEditController($useCase, $renderer, $useCaseTwo);
});

AppFactory::setContainer($container);
$app = AppFactory::create();

$customErrorHandler = function (
    ServerRequestInterface $request,
    Throwable $exception,
    bool $displayErrorDetails,
    bool $logErrors,
    bool $logErrorDetails,
    ?LoggerInterface $logger = null
) use ($app) {
    if ($logger) {
        $logger->error($exception->getMessage());
    }

    $payload = ['error' => $exception->getMessage()];

    $response = $app->getResponseFactory()->createResponse();

    return $response;
};


$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setDefaultErrorHandler($customErrorHandler);
return ['app' => $app, 'container' => $container];
