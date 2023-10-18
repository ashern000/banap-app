## User Login Code

   try {
  $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
  $userRepo = new MySQLRepo($pdo);
  $bcrypt = new bcryptHashAdapter();
  $session = new SessionSaveAdapter();
  echo $_SESSION["session_user"];
  $validator = new ValidatorAdapter();
  $userCase = new UserLogin($userRepo, $session, $validator);
  $input = new InputBoundary("asherndebortoli@hotmail.com", '123456789', "Asher");
  $userCase->handle($input);
} catch (Exception $e) {
  echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}

## User Create Code

    try {
  $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
  $userRepo = new MySQLRepo($pdo);
  $bcrypt = new bcryptHashAdapter();
  $userCase = new UserCreate($userRepo, $bcrypt);
  $input = new InputBoundary("asherndebortoli@novells.com", "12345678", "Asher Novelli", "sadsdsadsdsaadsasd");
  $userCase->handle($input);
} catch (Exception $e) {
  echo "<h1>DEU ERROR</h1>" . $e->getMessage();
}

## User Edit Code

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
        $userRepo = new MySQLRepo($pdo);
        $session = new SessionSaveAdapter();
        $bcrypt = new bcryptHashAdapter();
        $useCase = new UserEdit($userRepo,$session,$bcrypt);
        $input = new InputBoundary('1',"Asher", "12345678", "asherndebortoli@gmail.com", "alksdjlkasdjlkjsadlkdasj");
        $useCase->handle($input);
    
    } catch (Exception $e) {
        echo "<h1>DEU ERROR</h1>" . $e->getMessage();
    }







# Query the database for the users

