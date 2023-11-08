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

## Field Create Code

    try {
    $pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
      $fieldRepo = new FieldRepository($pdo);
    $session = new SessionSaveAdapter();
      $fieldUseCase = new FieldCreate($fieldRepo, $session);
      $input = new FieldCreateInputBoundary(1,"Talhao banana", "Um talhao para bananas" , 0.0,"2023-03-12", "Banana", 2, 3.1,'2023-23-02', 8.6, 6.5, 5.4, 5.3, 0);
      $fieldUseCase->handle($input);
    } catch (Exception $e) {
    echo "<h1>DEU ERROR</h1>" . $e->getMessage();
    }

# Querys of database for app

### Users query

    create table users(
      id int not null auto_increment primary key,
        nameUser varchar(255) not null,
        emailUser varchar(255) not null,
        passwordUser varchar(255) not null,
        profilePic varchar(255) not null
    );

### Field query

    create table Fields_Banap(
      id int not null auto_increment primary key,
        nameField varchar(200) not null UNIQUE,
        idUser int not null,
        descriptionField text not null,
        spaceField float not null,
        whenRegistered date,
        culture varchar(75) not null,
        plantsForField int not null,
        centerPointField float not null,
        lastDayFertilized date not null,
        pointOne float not null,
        pointTwo float not null,
        pointThree float not null,
        pointFour float not null,
        analisys int not null,
        activate int not null,
        constraint fk_UserId foreign key (idUser) references users(id)
    );


### Analysis query

    create table Analysis_Banap(
      id int not null auto_increment primary key
      id_talhao int not null,
      necessidade_calagem float not null,
      saturacao_base_desejada float not null,
      saturacao_base_atual float not null,
      CTC float not null,
      PRNT float not null
    );