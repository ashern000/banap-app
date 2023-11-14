<?php

require __DIR__ . "/../vendor/autoload.php";

session_start(['cookie_lifetime' => 3600, 'cookie_secure' => true, 'cookie_httponly' => true]);

ini_set('log_errors', 1);
error_reporting(0);



try {
    $bootstrap = require __DIR__ . "/bootstrap.php";


    $app = $bootstrap['app'];
    $container = $bootstrap['container'];
    $app->get("/", "HomeController:handle");

    $app->get("/login", "UserLoginController:show");
    $app->post("/login", "UserLoginController:handle");

    $app->get("/register", "UserRegistrationController:show");
    $app->post("/register", "UserRegistrationController:handle");

    $app->get("/edit", "UserEditController:show");
    $app->post("/edit", "UserEditController:handle");

    $app->get("/field", "FieldCreateController:show");
    $app->post("/field", "FieldCreateController:handle");

    $app->get("/analysis", "RegisterLimingController:show");
    $app->post("/analysis", "RegisterLimingController:handle");

    $app->get("/field-create", "FieldCreateController:show");
    $app->post("/field-create", "FieldCreateController:handle");

    $app->get("/field-show", "FieldShowByIdUserController:show");

    $app->get("/user-home", "UserHomeController:handle");

    $app->get("/field-edit/{id}", "FieldEditController:show");

    $app->addBodyParsingMiddleware();
    $app->any('/{any:.*}', "NotFoundController:handle");
    $app->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}
