<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Funcionário</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2d2626;
            color: #d9b785; /* Cor do texto dentro dos campos de texto */
        }
        .navbar {
            background-color: #2d2626; /* Cor da navbar */
        }
        .navbar .navbar-brand, .navbar .navbar-nav .nav-link {
            color: #d9b785; /* Cor do texto da navbar */
        }
        .form-control {
            background-color: #120c0c; /* Cor de fundo dos campos de texto */
            color: #d9b785; /* Cor do texto dentro dos campos de texto */
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Novo Funcionário</h1>
        <?php
        // Inclui o arquivo de configuração
        

        // Cria a conexão usando as constantes definidas
        $conn = new mysqli(HOST, USER, PASS, BASE);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        $sqlTrabalho = "SELECT * FROM trabalho";
        $resTrabalho = $conn->query($sqlTrabalho);
        ?>
        <form action="?page=salvar-funcionario" method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            <div class="mb-3">
                <label>Nome do Funcionário</label>
                <input type="text" name="nome" class="form-control">
            </div>
            <div class="mb-3">
                <label>CPF</label>
                <input type="text" name="cpf" class="form-control">
            </div>
            <div class="mb-3">
                <label>Data de Admissão</label>
                <input type="date" name="data_admissao" class="form-control">
            </div>
            <div class="mb-3">
                <label>Salário</label>
                <input type="number" step="0.01" name="salario" class="form-control">
            </div>
            <div class="mb-3">
                <label>Cargo</label>
                <select name="cargo" class="form-control">
                    <?php while ($trabalho = $resTrabalho->fetch_object()): ?>
                        <option value="<?php echo $trabalho->id; ?>"><?php echo $trabalho->cargo; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Metas</label>
                <input type="text" name="metas" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>