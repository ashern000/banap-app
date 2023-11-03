<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

require __DIR__ . "/../vendor/autoload.php";


session_start(['cookie_lifetime' => 1200, 'cookie_secure' => true, 'cookie_httponly' => true]);

ini_set('log_errors', 1);
error_reporting(0); 

$bootstrap = require __DIR__ . "/bootstrap.php";

echo "sessão: ".$_SESSION['session_user'];

$app = $bootstrap['app'];
$container = $bootstrap['container'];
$app->get("/", "HomeController:handle");
$app->get("/login", "UserLoginController:show");
$app->get("/register", "UserRegistrationController:show");
$app->post("/login", "UserLoginController:handle");
$app->post("/register", "UserRegistrationController:handle");
$app->get("/field", "FieldCreateController:show");
$app->post("/field", "FieldCreateController:handle");
$app->get("/analisy", "AnalisysController:show");
$app->post("/analisy", "AnalisysController:handle");
$app->any('/{any:.*}', "NotFoundController:handle");

$app->run();
