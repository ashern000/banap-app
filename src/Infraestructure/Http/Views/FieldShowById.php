<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="/assets/Field.css">
    <title>Talhão</title>
</head>
<body>
    <div class="wrap">
        <div class="frame">
            <div class="banap-vetor cima">
                <img src="assets/img/vetor-tela7-cima.svg">
            </div>
            <div class="content div-1">
                <div class="container-1">
                    <a href="UserHome2.html"><img src="assets/img/vetor-tela7-seta.svg" alt=""></a>
                    <h1 class="banap-title"><?=$data['nameField']?></h1>
                </div>
            </div>
            <div class="content div-2">
                <h2 class="field-culture">Banana nanica.</h2>
                <div class="field-image">
                    <img src="assets/img/tela7-talhao-img.png" alt="">
                </div>
                <h3 class="field-description"><?=$data["descriptionField"]?>. A quantidade de plantas que podem ser plantadas, segundo o cálculo feito, é de <b>10</b></h3>
                <div class="field-commands">
                    <a href="FieldEdit.html ">
                        <div class="field-edit">
                            <img src="assets/img/vetor-tela7-editar.svg" alt="">
                        </div>
                    </a>
                    <a href="">
                        <div class="field-delete">
                            <img src="assets/img/vetor-tela7-excluir.svg" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="content div-3"></div>
        </div>
    </div>
</body>
</html>