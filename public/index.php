<?php

use src\Domain\valueObjects\Email;
use src\Infraestructure\Adapters\EmailSenderAdapter;

require __DIR__ . "/../vendor/autoload.php";

session_start(['cookie_lifetime' => 3600, 'cookie_secure' => true, 'cookie_httponly' => true]);

ini_set('log_errors', 1);
error_reporting(0);


$bootstrap = require_once __DIR__ . "/bootstrap.php";

try {



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

    $app->get("/analysis/{id}", "RegisterLimingController:show");
    $app->post("/analysis/{id}", "RegisterLimingController:handle");

    $app->get("/field-create", "FieldCreateController:show");
    $app->post("/field-create", "FieldCreateController:handle");

    $app->get("/field-show/{id}", "FieldShowByIdFieldController:show");

    $app->get("/user-home", "UserHomeController:handle");

    $app->get("/field-edit/{id}", "FieldEditController:show");
    $app->post("/field-edit/{id}", "FieldEditController:handle");

    $app->post("/field-delete/{id}", "FieldDeleteController:handle");

    $app->addBodyParsingMiddleware();
    $app->any('/{any:.*}', "NotFoundController:handle");
    $app->run();
} catch (\Exception $e) {
}

?>

<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
</head>

<body>
    <script>
     
            alert("<?php echo $error ?>")
    
    </script>
</body>

</html> -->