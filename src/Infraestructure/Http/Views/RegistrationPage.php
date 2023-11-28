<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="assets/UserRegister.css">
    <script src="/assets/js/animation.js"></script>
    <title>Cadastro</title>
</head>

<body>
    <div class="wrap">
        <div class="frame">
            <div class="banap-vetor cima">
                <img src="assets/img/vetor-tela2-cima.svg" alt="">
            </div>
            <div class="banap-vetor baixo">
                <img src="assets/img/vetor-tela-2-baixo.svg" alt="">
            </div>
            <div class="content div-1">
                <h1 class="banap-title">Antes de começar <br>a utilizar o <b>Banap...</b></h1>
                <h3 class="banap-subtext">Um cadastro deve ser realizado!<br>Precisamos das suas informações, nos<br>diga seu...</h3>
            </div>
            <form action="/register" method="POST">
                <div class="content div-2">
                    <div class="form-input">
                        <label for="nome" class="banap-label">Nome</label>
                        <input type="text" name="nome" id="nome" class="input" placeholder="Exemplo">
                    </div>
                    <div class="form-input">
                        <label for="email" class="banap-label">Email</label>
                        <input type="text" name="email" id="email" class="input" placeholder="exemplo@gmail.com">
                    </div>
                    <div class="form-input">
                        <label for="senha" class="banap-label">Senha</label>
                        <input type="password" name="senha" id="senha" class="input" placeholder="ab12345@">
                    </div>
                </div>
                <div class="content div-3">
                    <button class="form-button">Continuar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        if (<?= $data['created'] ?>) {
            alert(`Seja bem vindo <?= $data["name"] ?>`)
            document.location = "/login"
        }
    </script>
</body>

</html>