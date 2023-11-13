<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="assets/UserLogin.css">
    <script src="assets/js/animation.js"></script>
    <title>Login</title>
</head>

<body>
    <div class="wrap">
        <div class="frame">
            <div class="banap-vetor baixo">
                <img src="assets/img/vetor-tela1-baixo.svg" alt="" />
            </div>
            <div class="banap-vetor cima">
                <img src="assets/img/vetor-tela1-cima.svg" alt="">
            </div>
            <div class="content div-1">
                <h1 class="banap-title">Banap</h1>
                <h2 class="banap-text">Entre com sua<br>conta!</h2>
            </div>
            <form action="/login" method="POST">
                <div class="content div-2">
                    <div class="form-input email">
                        <label for="email">Email</label>
                        <input type="text" class="input" name="email" id="email" placeholder="exemplo@gmail.com" required>
                    </div>
                    <div class="form-input senha">
                        <label for="password">Senha</label>
                        <input type="password" class="input" name="password" id="password" placeholder="ab12345@" required>
                    </div>
                    <span>
                        <h3 class="banap-subtext">Esqueceu sua senha?</h3>
                    </span>
                </div>
                <div class="content div-3">
                    <button class="form-button">Entrar</button>
                    <h3 class="banap-subtext">Não possui uma conta? <a href="/register"><b>Crie uma.</b></a></h3>
                </div>
            </form>
        </div>
    </div>
    <script>
        if (<?= $data['logged'] ?>) {
            alert(`Seja bem vindo <?= $data["name"] ?>`)
            document.location = "/user-home"
        }
    </script>
</body>

</html>