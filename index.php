<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reajuste</title>
    <!-- Adicionando o link para o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        img.nota{
            height: 50px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php 
    $saque= $_GET['saque']??0;
    ?>
    <header class="container"><h1 class="text-center">Caixa Eletrônico</h1></header>
    <main class="container">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="get" class="mt-5">
                <div class="form-group">
                    <label for="saque">Qual valor você deseja sacar?(R$)<sup>*</sup></label>
                    <input type="number" name="saque" id="saque" step="5" required value="<?= $saque?>" class="form-control">
                </div>
                <p style="font-size: 0.9em;"><sup>*</sup>Notas disponíveis: R$100, R$50, R$20, R$10 e R$5</p>
                <p><input type="submit" value="Sacar" class="btn btn-primary"></p>
            </form>
    </main>
    <?php 

    $resto = $saque;
    $cedula100 = (int)($resto /100);
    $resto %= 100;

    $cedula50 = (int)($resto /50);
    $resto %= 50;

    $cedula20 = (int)($resto /20);
    $resto %= 20;

    $cedula10 = (int)($resto /10);
    $resto %= 10;

    $cedula5 = (int)($resto /5);
    $resto %= 5;
    ?>
    <section class="container mt-5">
        <h2 class="text-center">Saque de R$<?= number_format($saque, 2, ",",".")?></h2>
        <p class="text-center">O caixa eletrônico vai te entregar as seguintes notas:</p>
        <ul class="list-unstyled d-flex justify-content-center">
            <li class="mr-3"><img src="imagem/100-reais.jpg" alt="Nota de 100" class="nota">x<?=$cedula100?></li>

            <li class="mr-3"><img src="imagem/50-reais.jpg" alt="Nota de 50" class="nota">x<?=$cedula50?></li>
            <li class="mr-3"><img src="imagem/20-reais.jpg" alt="Nota de 20" class="nota">x<?=$cedula20?></li>
            <li class="mr-3"><img src="imagem/10-reais.jpg" alt="Nota de 10" class="nota">x<?=$cedula10?></li>
            <li><img src="imagem/5-reais.jpg" alt="Nota de 5" class="nota">x<?=$cedula5?></li>
        </ul>
    </section>
</body>
</html>
