# Banap-app

[![PHP](https://img.shields.io/badge/PHP-%23777BB4.svg?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![VSCode](https://img.shields.io/badge/VSCode-%23007ACC.svg?style=flat&logo=visual-studio-code&logoColor=white)](https://code.visualstudio.com/)
[![JavaScript](https://img.shields.io/badge/JavaScript-%23F7DF1E.svg?style=flat&logo=javascript&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![CSS](https://img.shields.io/badge/CSS-%231572B6.svg?style=flat&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![HTML](https://img.shields.io/badge/HTML-%23E34F26.svg?style=flat&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![MySQL](https://img.shields.io/badge/MySQL-%234479A1.svg?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com/)

[![Clean Architecture](https://img.shields.io/badge/Clean%20Architecture-%23111111.svg?style=flat)](https://blog.cleancoder.com/uncle-bob/2012/08/13/the-clean-architecture.html)

O Banap é uma plataforma inovadora desenvolvida para facilitar a gestão eficiente de talhões de bananas, proporcionando aos agricultores uma ferramenta abrangente para monitorar e otimizar suas plantações. A aplicação abrange desde o registro detalhado de informações sobre cada talhão até a realização de análises de solo, contribuindo para decisões informadas e maximização do rendimento agrícola.

Recursos Principais
Gestão de Talhões:

Cadastre e mantenha informações detalhadas sobre cada talhão, incluindo localização geográfica, tamanho, histórico de plantio e colheitas anteriores.
Análise de Solo:

Realize cálculos de análises de solo para determinar a saúde do terreno em cada talhão.
Acesse relatórios precisos sobre nutrientes, pH e outras características essenciais do solo.
Histórico de Cultivo:

Registre e acompanhe o histórico de cultivo em cada talhão para avaliar tendências ao longo do tempo.
Identifique padrões sazonais e tome decisões estratégicas com base em dados históricos.
Projeções de Colheita:

Utilize dados históricos e análises de solo para criar projeções de colheita e planejar futuras safras.
Receba alertas sobre condições ideais de plantio e colheita.
Tecnologias Utilizadas
Linguagens: PHP, JavaScript, HTML, CSS
Banco de Dados: MySQL
Arquitetura: Clean Architecture

Instalação
Para instalar o Banap em seu ambiente local, siga as instruções para a instalação.

Contribuição
O Banap é um projeto de código aberto, e encorajamos contribuições da comunidade para melhorar e expandir suas funcionalidades.

Junte-se a nós no Banap e transforme a gestão de talhões de bananas em uma experiência eficiente e orientada por dados!

# Banap - Guia de Instalação

## Requisitos

Antes de começar, certifique-se de ter os seguintes requisitos instalados em sua máquina:

- [XAMPP](https://www.apachefriends.org/index.html) (versão 8.0)
- [Composer](https://getcomposer.org/)
- Extensões PHP necessárias para o seu projeto
- MySQL (certifique-se de que o servidor MySQL está ligado)

## Passos de Instalação

### 1. Clonar o Repositório

```bash
cd /xampp/htdocs
git clone https://github.com/ashern000/banap-app
cd banap-app
```

### 2. Instalar as Dependências

```bash
composer install
```

### 3. Criar o Banco de Dados e as Tabelas

```
-- Criar o banco de dados
CREATE DATABASE IF NOT EXISTS `BanapDB`;

-- Usar o banco de dados
USE `BanapDB`;

-- Tabelas
-- Tabela Users
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nameUser` VARCHAR(255) NOT NULL,
    `emailUser` VARCHAR(255) NOT NULL,
    `passwordUser` VARCHAR(255) NOT NULL,
    `profilePic` VARCHAR(255) NOT NULL
);

-- Tabela Fields_Banap
CREATE TABLE IF NOT EXISTS `Fields_Banap` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `nameField` VARCHAR(200) NOT NULL UNIQUE,
    `idUser` INT NOT NULL,
    `descriptionField` TEXT NOT NULL,
    `spaceField` FLOAT NOT NULL,
    `whenRegistered` DATE,
    `culture` VARCHAR(75) NOT NULL,
    `plantsForField` INT NOT NULL,
    `centerPointField` FLOAT NOT NULL,
    `lastDayFertilized` DATE NOT NULL,
    `pointOne` FLOAT NOT NULL,
    `pointTwo` FLOAT NOT NULL,
    `pointThree` FLOAT NOT NULL,
    `pointFour` FLOAT NOT NULL,
    `analisys` INT NOT NULL,
    `activate` INT NOT NULL,
    CONSTRAINT `fk_UserId` FOREIGN KEY (`idUser`) REFERENCES `users`(`id`)
);

-- Tabela Analysis_Banap
CREATE TABLE IF NOT EXISTS `Analysis_Banap` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_talhao` INT NOT NULL,
    `necessidade_calagem` FLOAT NOT NULL,
    `saturacao_base_desejada` FLOAT NOT NULL,
    `saturacao_base_atual` FLOAT NOT NULL,
    `CTC` FLOAT NOT NULL,
    `PRNT` FLOAT NOT NULL,
    CONSTRAINT `fk_IdTalhao` FOREIGN KEY (`id_talhao`) REFERENCES `Fields_Banap`(`id`)
);

```

# Estrutura da Aplicação

    banap-app/
    |-- src/
    |   |-- Domain/
    |   |   |-- Entities/
    |   |   |   |-- Analysis.php
    |   |   |   |-- Field.php
    |   |   |   |-- User.php
    |   |   |-- Repositories/
    |   |   |-- valueObjects/
    |   |-- Application/
    |   |   |-- Contracts/
    |   |   |-- UseCases/
    |   |   |   |-- Analysis/
    |   |   |   |   |-- LimingCalculation.php
    |   |   |   |-- Field/
    |   |   |   |   |-- FieldCreate.php
    |   |   |   |   |-- FieldDelete.php
    |   |   |   |   |-- FieldEdit.php
    |   |   |   |   |-- FieldShowByIdUser.php
    |   |   |   |-- User/
    |   |   |   |   |-- UserCreate.php
    |   |   |   |   |-- UserEdit.php
    |   |   |   |   |-- UserLogin.php
    |   |   |   |   |-- UserLogout.php
    |   |-- Infrastructure/
    |   |   |-- Adapters/
    |   |   |-- Http/
    |   |   |   |-- Controllers/
    |   |   |   |   |-- Analysis/
    |   |   |   |   |   |-- AnalysisController.php
    |   |   |   |   |-- Field/
    |   |   |   |   |   |-- FieldController.php
    |   |   |   |   |-- User/
    |   |   |   |   |   |-- UserController.php
    |   |   |   |-- Views/
    |   |   |   |-- Contracts/
    |   |   |-- Repositories/
    |   |   |   |   |-- MySQL/
    |   |   |   |   |   |-- AnalysisRepository.php
    |   |   |   |   |   |-- FieldRepository.php
    |   |   |   |   |   |-- UserRepository.php
    |   |   |   |   |-- PostgreSQL/
    |   |   |   |   |   |-- FieldRepository.php
    |-- public/
        |-- assets/
        |    |-- img/
        |    |-- js/
        |-- .htaccess
        |-- bootstrap.php
    |   |-- index.php
    |-- composer.json
    |-- README.md