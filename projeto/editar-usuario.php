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
        <h1>Editar Receita</h1>
        <?php
        $sql = "SELECT * FROM cargos WHERE id=" . $_REQUEST["id"];
        $res = $conn->query($sql);
        $row = $res->fetch_object();

        $sqlCategoria = "SELECT * FROM categoria";
        $resCategoria = $conn->query($sqlCategoria);
        ?>
        <form action="?page=salvar" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php print $row->id; ?>">
            <div class="mb-3">
                <label>Nome da Receita</label>
                <input type="text" name="receita" value="<?php print $row->receita; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label>Ingredientes</label>
                <input type="text" name="ingredientes" value="<?php print $row->ingredientes; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label>Preparo</label>
                <input type="text" name="preparo" value="<?php print $row->preparo; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label>Tipo Gastronômico</label>
                <select name="tipo" class="form-control">
                    <?php while ($categoria = $resCategoria->fetch_object()): ?>
                        <option value="<?php echo $categoria->id; ?>" <?php if (isset($row->tipo) && $categoria->id == $row->tipo) { echo "selected"; } ?>><?php echo $categoria->tipo; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Dificuldade de Preparo</label>
                <select name="dificuldade" class="form-control">
                    <option value="Fácil" <?php if ($row->dificuldade == 'Fácil') echo 'selected'; ?>>Fácil</option>
                    <option value="Médio" <?php if ($row->dificuldade == 'Médio') echo 'selected'; ?>>Médio</option>
                    <option value="Difícil" <?php if ($row->dificuldade == 'Difícil') echo 'selected'; ?>>Difícil</option>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>