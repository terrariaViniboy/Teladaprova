<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folha de Pagamento</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Folha de Pagamento</h1>

    <form method="POST" action="">
        <div class="form-group">
            <label for="nome">Nome do Funcionário</label>
            <input type="text" id="nome" name="nome" required placeholder="Digite o nome">
        </div>

        <div class="form-group">
            <label for="salario_bruto">Salário Bruto (R$)</label>
            <input type="number" id="salario_bruto" name="salario_bruto" step="0.01" required placeholder="0.00">
        </div>

        <button type="submit" name="calcular">Calcular Descontos</button>
    </form>

    <?php
    if (isset($_POST['calcular'])) {
        $nome = htmlspecialchars($_POST['nome']);
        $salarioBruto = floatval($_POST['salario_bruto']);

        // Cálculos conforme o enunciado
        $ir = $salarioBruto * 0.11;
        $inss = $salarioBruto * 0.08;
        $sindicato = $salarioBruto * 0.02;
        $salarioLiquido = $salarioBruto - ($ir + $inss + $sindicato);

        echo "<div class='result'>";
        echo "<h3>Resultado para: $nome</h3>";
        echo "<p>Salário Bruto: <span>R$ " . number_format($salarioBruto, 2, ',', '.') . "</span></p>";
        echo "<p>IR (11%): <span class='desconto'>- R$ " . number_format($ir, 2, ',', '.') . "</span></p>";
        echo "<p>INSS (8%): <span class='desconto'>- R$ " . number_format($inss, 2, ',', '.') . "</span></p>";
        echo "<p>Sindicato (2%): <span class='desconto'>- R$ " . number_format($sindicato, 2, ',', '.') . "</span></p>";
        echo "<div class='total'>Salário Líquido: R$ " . number_format($salarioLiquido, 2, ',', '.') . "</div>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>