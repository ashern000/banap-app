## User Login Code

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
        $userRepo = new MySQLRepo($pdo);
        $bcrypt = new bcryptHashAdapter();
        $session = new SessionSaveAdapter();
        echo $_SESSION["Asher"];
        $validator = new ValidatorAdapter();
        $userCase = new UserLogin($userRepo,$session, $validator);
        $input = new InputBoundary("asherndebortoli@hotmail.com", '123456789',"Asher");
        $userCase->handle($input);
    } catch (Exception $e) {
        echo "<h1>DEU ERROR</h1>" . $e->getMessage();
    }


## User Create Code

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
        $userRepo = new MySQLRepo($pdo);
        $bcrypt = new bcryptHashAdapter();
        $userCase = new UserCreate($userRepo,$bcrypt);
        $input = new UserCreateInputBoundary("asherndebortoli@novells.com", "12345678", "Asher Novelli", "sadsdsadsdsaadsasd");
        $userCase->handle($input);
    } catch (Exception $e) {
        echo "<h1>DEU ERROR</h1>" . $e->getMessage();
    }