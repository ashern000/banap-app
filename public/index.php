<?php

require __DIR__ . "/../vendor/autoload.php";

use src\domain\entities\User;
use src\domain\valueObjects\Email;
use src\domain\valueObjects\Password;

try{
$user = new User();
$user->setName("asdds")->setEmail(new Email("asherndebortoli@gmail.com"))->setPassword(new Password("1244233423243243"));
echo $user->getName(). "<br>";
echo $user->getEmail() . "<br>";
echo $user->getPassword();
} catch(Exception $e){
    echo $e;
}