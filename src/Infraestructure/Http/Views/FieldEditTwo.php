<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      </style>
    <link rel="stylesheet" href="/assets/FieldEdit2.css">
    <script src="/assets/js/animation.js"></script>
    <title>Cadastro Talhão</title>
</head>
<body>
    <div class="wrap">
        <div class="frame">
            <div class="banap-vetor cima">
                <img src="assets/img/vetor-tela4-cima.svg" alt="">
            </div>
            <div class="banap-vetor baixo">
                <img src="assets/img/vetor-tela4-baixo.svg" alt="">
            </div>
            <div class="content div-1">
                <h1 class="banap-title">Atualizando seu <b>Talhão...</b></h1>
                <h3 class="banap-subtext">Digite pelo menos 3 dos 4 pontos<br>para cadastrar a localização do seu talhão!</h3>
            </div>
            <form action="/field-edit/{<?= $data['id']?>}" method="POST">
                <div class="content div-2">
                    <div class="form-input">
                        <label for="ponto1" class="banap-label">Ponto 1</label>
                        <input type="text" class="input" name="ponto1" id="ponto1" placeholder="Digite o primeiro valor..." required>
                    </div>
                    <div class="form-input">
                        <label for="ponto2" class="banap-label">Ponto 2</label>
                        <input type="text" class="input" name="ponto2" id="ponto2" placeholder="Digite o segundo valor..." required>
                    </div>
                    <div class="form-input">
                        <label for="ponto3" class="banap-label">Ponto 3</label>
                        <input type="text" class="input" name="ponto3" id="ponto3" placeholder="Digite o terceiro valor..." required>
                    </div>
                    <div class="form-input">
                        <label for="ponto4" class="banap-label">Ponto 4</label>
                        <input type="text" class="input" name="ponto4" id="ponto4" placeholder="Digite o quarto valor...">
                    </div>
                </div>
                <div class="content div-3">
                    <button class="form-button">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>