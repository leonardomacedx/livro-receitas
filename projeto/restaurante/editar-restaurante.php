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
    </style>
</head>
<body>

    <div class="container">
        <h1>Editar Restaurante</h1>
        <?php
        $sql = "SELECT * FROM restaurante WHERE id=".$_REQUEST["id"];
        $res = $conn->query($sql);
        $row = $res->fetch_object();
        ?>
        <form action="?page=salvar-restaurante" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php print $row->id; ?>">
            <div class="mb-3">
                <label>Nome do Restaurante</label>
                <input type="text" name="nome" value="<?php print $row->nome; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label>Tipo Gastronômico</label>
                <input type="text" name="tipo" value="<?php print $row->tipo; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label>Contato</label>
                <input type="text" name="contato" value="<?php print $row->contato; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label>Número de Telefone</label>
                <input type="text" name="numero" value="<?php print $row->numero; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
        </div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>