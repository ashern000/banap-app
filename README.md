# banap-app

This is the structure of our application

    my-api/
    |-- src/
    |   |-- Application/
    |   |   |-- UseCases/
    |   |   |   |-- CreateUser/
    |   |   |   |   |-- CreateUserUseCase.php
    |   |   |-- Interfaces/
    |   |   |   |-- UserRepositoryInterface.php
    |   |   |   |-- UserServiceInterface.php
    |   |-- Domain/
    |   |   |-- Entities/
    |   |   |   |-- User.php
    |   |   |-- Exceptions/
    |   |   |-- Repositories/
    |   |   |   |-- UserRepository.php
    |   |-- Infrastructure/
    |   |   |-- Persistence/
    |   |   |   |-- UserRepositoryDatabase.php
    |   |   |-- Web/
    |   |   |   |-- Controllers/
    |   |   |   |   |-- UserController.php
    |   |   |   |-- Routes/
    |   |   |   |   |-- api.php
    |   |   |-- Presenters/
    |   |   |   |-- JsonPresenter.php
    |-- config/
    |   |-- database.php
    |-- public/
    |   |-- index.php
    |-- composer.json
    |-- README.md
