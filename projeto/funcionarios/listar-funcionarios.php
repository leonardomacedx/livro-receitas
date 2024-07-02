<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionários</title>
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
        /* Estilo para a tabela de funcionários */
        table.table-funcionarios {
            background-color: #d3c2a8 !important; /* Cor de fundo da tabela de funcionários */
            color: #000000; /* Cor do texto dentro da tabela de funcionários */
            border: none; /* Remove as bordas da tabela */
        }
        /* Estilo para as células da tabela de funcionários */
        table.table-funcionarios td, table.table-funcionarios th {
            background-color: #d3c2a8; /* Cor de fundo das células da tabela de funcionários */
            color: #000000; /* Cor do texto nas células da tabela de funcionários */
            border: none; /* Remove as bordas das células da tabela */
        }
        /* Estilo para os links */
        a {
            color: #000000; /* Cor dos links */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center" style="margin-bottom: 50px;">FUNCIONÁRIOS</h1>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;">
            <h3>Lista de Funcionários</h3>
            <button class="btn btn-add-user" style="background-color: #00FF7F;" onclick="window.location.href='?page=novo-funcionario';">Adicionar</button>
        </div>

        <?php
        // Inclui o arquivo de configuração com as constantes do banco de dados
        

        // Cria a conexão usando as constantes definidas
        $conn = new mysqli(HOST, USER, PASS, BASE);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta SQL com JOIN para obter o nome do cargo
        $sql = "SELECT funcionario.*, trabalho.cargo AS nome_cargo 
                FROM funcionario 
                LEFT JOIN trabalho ON funcionario.cargo = trabalho.id";
        $res = $conn->query($sql);

        // Verifica se a consulta foi bem-sucedida
        if ($res === false) {
            die("Erro na consulta: " . $conn->error);
        }

        $qtd = $res->num_rows;

        if ($qtd > 0) {
            print "<table class='table table-hover table-striped table-bordered table-funcionarios'>";
            print "<tr>";
            print "<th>Nome do Funcionário</th>";
            print "<th>CPF</th>";
            print "<th>Data de Admissão</th>";
            print "<th>Salário</th>";
            print "<th>Cargo</th>";
            print "<th>Metas</th>";
            print "</tr>";
            while ($row = $res->fetch_object()) {
                print "<tr>";
                print "<td><a href='?page=editar-funcionario&id=".$row->id."'>".$row->nome."</a></td>";
                print "<td>".$row->cpf."</td>";
                print "<td>".$row->data_admissao."</td>";
                print "<td>R$ ".$row->salario."</td>";
                print "<td>".$row->nome_cargo."</td>";
                print "<td>".$row->metas."</td>";
                print "<td style='text-align: right;'>
                        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-funcionario&acao=excluir&id=".$row->id."';}else{return false;}\" class='btn btn-danger'>Excluir</button>
                       </td>";
                print "</tr>";
            }
            print "</table>";
        } else {
            print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
        }
        ?>

    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>