<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="/assets/ListAnalysis.css">
    <script src="/assets/js/animation.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="wrap">
        <div class="frame">
            <div class="banap-vetor cima">
                <img src="/assets/img/vetor-tela7-cima.svg">
            </div>
            <div class="content div-1">
                <div class="container-1">
                    <a href="/user-home?>"><img src="/assets/img/vetor-tela7-seta.svg"></a>
                    <h1 class="banap-title">Análises</h1>
                </div>
            </div>
            <div class="content div-2">
                <?php for($i = 0; $i <count($data[0]); $i++):?>
                    <?php $item = $data[0][$i];?>
                <div class="analysis">
                    <h2>Calculo de calagem do solo!</h2>
                    <h3>Calcário</h3>
                    <div class="result">
                        <h2><?= $item['necessidade_calagem']; ?> kg/ha</h2>
                    </div>
                </div>
                <?php endfor;?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>