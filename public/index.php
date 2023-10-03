<?php

require __DIR__ . "/../vendor/autoload.php";

use src\aplication\useCases\userLogin\InputBoundary;
use src\aplication\useCases\userLogin\UserLogin;
use src\infra\adapters\SessionSaveAdapter;
use src\infra\repositories\MySQL\MySQLRepo;

$pdo = new PDO("mysql:host=localhost;dbname=test","root","");
$userRepo = new MySQLRepo($pdo);
$sessionSaver = new SessionSaveAdapter();
$userUseCase = new UserLogin($userRepo,$sessionSaver);
$input = new InputBoundary("asherndebortoli@gmail.com","12345678", "asher");
$userUseCase->handle($input);
