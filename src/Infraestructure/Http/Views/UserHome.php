<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="assets/UserHome2.css">
    <script src="assets/js/animation.js"></script>
    <title>Início</title>
</head>

<body>
    <div class="wrap">
        <div class="frame">
            <div class="banap-vetor cima">
                <img src="assets/img/vetor-tela6-cima.svg">
            </div>
            <div class="content div-1">

                <h2 class="user-name">Olá, <b><?= $data['name'] ?></b></h2>
                <div class="user-profilepic"></div>
            </div>
            <div class="content div-2">

                <div class="container-1">
                    <h1 class="banap-title">Talhões</h1>
                    <img src="assets/img/vetor-tela6-seta.svg" alt="">
                </div>
                <div class="container-2">
                    <?php for ($i = 0; $i < count($data['order'][0]); $i++) : ?>
                        <?php $item = $data['order'][0][$i]; ?>
                        <a href='/field-show/{<?php echo $item["id"] ?>}'>
                            <div class="banap-field">
                                <div class="field-image">
                                    <img src="assets/img/tela6-talhao-img.png" alt="">
                                </div>
                                <div class="field-name">
                                    <h2 class="field-name-text"><?= $item['nameField'] ?></h2>
                                </div>
                            </div>
                        </a>
                    <?php endfor; ?>



                    <a href="/field-create">
                        <div class="banap-field-create">
                            <div class="field-image-create">
                                <img src="assets/img/vetor-tela6-cruz.svg" alt="">
                            </div>
                            <div class="field-name-create"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>