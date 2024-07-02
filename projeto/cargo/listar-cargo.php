<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cargos</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
    background-color: #2d2626;
    color: #d9b785;  
}
.navbar {
    background-color: #2d2626;  
}
.navbar .navbar-brand, .navbar .navbar-nav .nav-link {
    color: #d9b785;
}
.form-control {
    background-color: #120c0c;
    color: #d9b785;   
}
table.table-receitas {
    background-color: #d3c2a8 !important; 
    color: #000000; 
    border: none; 
}
table.table-receitas td, table.table-receitas th {
    background-color: #d3c2a8;
    color: #000000;
    border: none;
}
a {
    color: #000000;
}
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center" style="margin-bottom: 50px;">CARGOS</h1>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;">
            <h3>Lista de Cargos</h3>
            <button class="btn btn-add-user" style="background-color: #00FF7F;" onclick="window.location.href='?page=novo-cargo';">Adicionar</button>
        </div>

        <?php
        $sql = "SELECT * FROM trabalho";
        $res = $conn->query($sql);
        $qtd = $res->num_rows;

        if ($qtd > 0) {
            print "<table class='table table-hover table-striped table-bordered table-receitas'>";
            print "<tr>";
            print "<th>Nome</th>";
            print "</tr>";
            while ($row = $res->fetch_object()) {
                print "<tr>";
                print "<td style='display: flex; justify-content: space-between; align-items: center;'>
                        <a href='?page=editar-cargo&id=".$row->id."'>".$row->cargo."</a>
                        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-cargo&acao=excluir&id=".$row->id."';}else{return false;}\" class='btn btn-danger'>Excluir</button>
                       </td>";
                print "</tr>";
            }
            print "</table>";
        } else {
            print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
        }
        ?>