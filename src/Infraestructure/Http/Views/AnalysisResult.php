<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
      </style>
    <link rel="stylesheet" href="assets/ResultAnalysis.css">
    <script src="assets/js/animation.js"></script>
    <title>Resultado Análise</title>
</head>
<body>
    <div class="wrap">
        <div class="frame">
            <div class="banap-vetor">
                <img src="assets/img/vetor-tela5-cima.svg">
            </div>
            <div class="content div-1">
                <h1 class="banap-title">Cálculo de Calagem do <b>Solo...</b></h1>
            </div>
            <form action="/analysis" method="GET">
                <div class="content div-2">
                    <div class="form-input">
                        <label for="sb" class="banap-label">Saturação de bases atual (V%)</label>
                        <input type="text" class="input" name="sb" id="sb" placeholder="<?=$data['sb']?>%" readonly>
                    </div>
                    <div class="form-input">
                        <label for="ctc" class="banap-label">CTC</label>
                        <input type="text" class="input" name="ctc" id="ctc" placeholder="<?=$data['ctc']?>" readonly>
                    </div>
                    <div class="form-input">
                        <label for="prnt" class="banap-label">PRNT em %</label>
                        <input type="text" class="input" name="prnt" id="prnt" placeholder="<?=$data['prnt']?>%" readonly>
                    </div>  
                </div>
                <div class="content div-3">
                    <div class="calc-object">
                        <h1 class="calc-text">Quantidade de Calcário para aplicação</h1>
                    </div>
                    <h1 class="calc-result"><?=$data["result"]?>kg/ha</h1>
                </div>
                <div class="content div-4">
                    <button class="form-button" readonly>Calcular</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>