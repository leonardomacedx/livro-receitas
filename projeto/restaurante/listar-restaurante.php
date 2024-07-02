<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página</title>
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
        /* Estilo para a tabela de receitas */
        table.table-receitas {
            background-color: #d3c2a8 !important; /* Cor de fundo da tabela de receitas */
            color: #000000; /* Cor do texto dentro da tabela de receitas */
            border: none; /* Remove as bordas da tabela */
        }
        /* Estilo para as células da tabela de receitas */
        table.table-receitas td, table.table-receitas th {
            background-color: #d3c2a8; /* Cor de fundo das células da tabela de receitas */
            color: #000000; /* Cor do texto nas células da tabela de receitas */
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
        <h1 class="text-center" style="margin-bottom: 50px;">RESTAURANTES</h1>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;">
            <h3>Lista de Restaurantes</h3>
            <button class="btn btn-add-user" style="background-color: #00FF7F;" onclick="window.location.href='?page=novo-restaurante';">Adicionar</button>
        </div>

        <?php
        $sql = "SELECT * FROM restaurante";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            print "<table class='table table-hover table-striped table-bordered table-receitas'>";
            print "<tr>";
            print "<th>Nome do Restaurante</th>";
            print "<th>Tipo Gastronômico</th>";
            print "<th>Contato</th>";
            print "<th>Número</th>";
            print "</tr>";
            while ($row = $res->fetch_object()) {
                print "<tr>";
                print "<td><a href='?page=editar-restaurante&id=".$row->id."'>".$row->nome."</a></td>";
                print "<td>".$row->tipo."</td>";
                print "<td>".$row->contato."</td>";
                print "<td>".$row->numero."</td>";
                print "<td style='text-align: right;'>
                        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-restaurante&acao=excluir&id=".$row->id."';}else{return false;}\" class='btn btn-danger'>Excluir</button>
                       </td>";
                print "</tr>";
            }
            print "</table>";
        } else {
            print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
        }
        ?>
