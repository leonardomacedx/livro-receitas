<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cargo</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Cargo</h1>
        <?php
        $sql = "SELECT * FROM trabalho WHERE id=".$_REQUEST["id"];
        $res = $conn->query($sql);
        $row = $res->fetch_object();
        ?>
        <form action="?page=salvar-cargo" method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?php print $row->id; ?>">
            <div class="mb-3">
                <label>Ocupação</label>
                <input type="text" name="cargo" value="<?php print $row->cargo; ?>" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>