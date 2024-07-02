<?php $row = array() ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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

<form class="container">
    <h1 class="text-center" style="margin-bottom: 50px;">LIVRO DE RECEITAS</h1>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;">
<!--        <h3>Livro de Receitas</h3>-->
        <label for="nome_livro">Nome do Livro de Receitas:</label>
        <input style="width: 20%; left: 30%; position: absolute;" type="text" id="nome_livro" name="nome_livro" required>
        <button type="submit" class="btn btn-add-user" style="background-color: #00FF7F;">Adicionar receitas no livro</button>
    </div>

    <?php
    $sql = "SELECT * FROM receitas ORDER BY nome ASC";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    $arrayReceitas = array();

    if ($qtd > 0) {
        print "<table class='table table-hover table-striped table-bordered table-receitas'>";
        print "<tr>";
        print "<th>Nome das Receitas</th>";
        print "</tr>";
        while ($row = $res->fetch_object()) {
            print "<tr id='receita'>";
            print "<td style='display: flex; justify-content: space-between; align-items: center;'>
                        <a href='?page=editar&id=".$row->id."'>".$row->nome."</a>
                        <button type='button' id='addReceita'  class='btn btn-danger'>Adicionar ao livro</button>                       </td>";
            print "</tr>";
        }
        print "</table>";
    } else {
        print "<p class='alert alert-danger'>Não encontrou resultados!</p>";
    }


    ?>

</form>
<script src="../js/bootstrap.bundle.min.js">

    function addReceita() {
        // Adicionar receita ao livro
        <?php
        $arrayReceitas[] = $row->id;
        ?>
        row.remove();
    }

</script>
</body>
</html>
<?php
if (isset($_POST['nome_livro'])) {
$sql = "INSERT INTO livro_receitas (nome_livro) VALUES ('".$_POST["nome_livro"]."')";
$conn->query($sql);
$id_novo_livro = $conn->insert_id;

foreach ($arrayReceitas as $receita) {
$sql = "INSERT INTO livro_receitas_receitas (id_livro, id_receita) VALUES ('".$id_novo_livro."', '".$receita."')";
$conn->query($sql);
}
}
?>


