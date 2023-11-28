<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      </style>
    <link rel="stylesheet" href="assets/FieldCreate.css">
    <script src="/assets/js/animation.js"></script>
    <title>Cadastro Talhão</title>
</head>
<body>
    <div class="wrap">
        <div class="frame">
            <div class="banap-vetor cima">
                <img src="assets/img/vetor-tela3-cima.svg" alt="">
            </div>
            <div class="banap-vetor baixo">
                <img src="assets/img/vetor-tela3-baixo.svg" alt="">
            </div>
            <div class="content div-1">
                <h1 class="banap-title">Cadastrando seu <b>Talhão...</b></h1>
            </div>
            <form action="/field-create" method="POST">
                <div class="content div-2">
                    <div class="form-input">
                        <label for="identificacao" class="banap-label">Identificação</label>
                        <input type="text" name="identificacao" id="identificacao" class="input" placeholder="Exemplo 01" required>
                    </div>
                    <div class="form-input">
                        <label for="descricao" class="banap-label">Descrição</label>
                        <textarea name="descricao" id="descricao" cols="30" rows="10" class="textarea" placeholder="Descreva seu talhão..."></textarea>
                    </div>
                    <div class="form-input">
                        <label for="cultura" class="banap-label">Cultura</label>
                        <select name="cultura" id="cultura" class="select">
                            <option value="Banana Nanica">Banana Nanica</option>
                            <option value="Banana Prata">Banana Prata</option>
                            <option value="Banana da Terra">Banana da Terra</option>
                        </select>
                    </div>
                </div>
                <div class="content div-3">
                    <button class="form-button">Continuar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>