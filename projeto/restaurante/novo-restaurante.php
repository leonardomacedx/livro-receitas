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
        <h1>Novo Restaurante</h1>
        <form action="?page=salvar-restaurante" method="POST">
            <input type="hidden" name="acao" value="cadastrar">
            <div class="mb-3">
                <label>Nome do Restaurante</label>
                <input type="text" name="nome" class="form-control">
            </div>
            <div class="mb-3">
                <label>Tipo Gastronômico</label>
                <input type="text" name="tipo" class="form-control">
            </div>
            <div class="mb-3">
                <label>Contato</label>
                <input type="text" name="contato" class="form-control">
            </div>
            <div class="mb-3">
                <label>Número de Telefone</label>
                <input type="text" name="numero" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>