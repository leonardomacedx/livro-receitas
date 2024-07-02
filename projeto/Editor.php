<?php

    session_start();

    if(!isset($_SESSION['id_usuario'])):

        header("location: index.php");
        exit;

    endif;


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
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
        /* Estilo para a tabela de categorias */
        table.table-categorias {
            background-color: #d3c2a8 !important; /* Cor de fundo da tabela de categorias */
            color: #000000; /* Cor do texto dentro da tabela de categorias */
            border: none; /* Remove as bordas da tabela */
        }
        /* Estilo para as células da tabela de categorias */
        table.table-categorias td, table.table-categorias th {
            background-color: #d3c2a8; /* Cor de fundo das células da tabela de categorias */
            color: #000000; /* Cor do texto nas células da tabela de categorias */
            border: none; /* Remove as bordas das células da tabela */
        }
        /* Estilo para os links */
        a {
            color: #000000; /* Cor dos links */
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="row">
        
        <div class="container">
    <h1 class="text-center" style="margin-bottom: 50px;"></h1>
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 50px;">
        <?php
        include("config.php");
        switch(@$_REQUEST["page"]) {
            case "areaPrivada":
                include("areaPrivada.php");
                break;
            case "abaEditor":
                include("abaEditor.php");
                break;
            case "novo":
                include("novo-usuario.php");
                break;
            case "listar":
                include("listar-usuario.php");
                break;
            case "salvar":
                include("salvar-usuario.php");
                break;
            case "editar":
                include("editar-usuario.php");
                break;
            case "novo-ingrediente":
                include("ingredientes/novo-ingrediente.php");
                break;
            case "listar-ingredientes":
                include("ingredientes/listar-ingredientes.php");
                break;
            case "salvar-ingredientes":
                include("ingredientes/salvar-ingredientes.php");
                break;
            case "editar-ingrediente":
                include("ingredientes/editar-ingrediente.php");
                break;
            case "novo-funcionario":
                include("funcionarios/novo-funcionario.php");
                break;
            case "listar-funcionarios":
                include("funcionarios/listar-funcionarios.php");
                break;
            case "salvar-funcionario":
                include("funcionarios/salvar-funcionario.php");
                break;
            case "editar-funcionario":
                include("funcionarios/editar-funcionario.php");
                break;
            case "novo-restaurante":
                include("restaurante/novo-restaurante.php");
                break;
            case "listar-restaurante":
                include("restaurante/listar-restaurante.php");
                break;
            case "salvar-restaurante":
                include("restaurante/salvar-restaurante.php");
                break;
            case "editar-restaurante":
                include("restaurante/editar-restaurante.php");
                break;
            case "novo-categoria":
                include("categoria/novo-categoria.php");
                break;
            case "listar-categoria":
                include("categoria/listar-categoria.php");
                break;
            case "salvar-categoria":
                include("categoria/salvar-categoria.php");
                break;
            case "editar-categoria":
                include("categoria/editar-categoria.php");
                break;
            case "novo-cargo":
                include("cargo/novo-cargo.php");
                break;
            case "listar-cargo":
                include("cargo/listar-cargo.php");
                break;
            case "salvar-cargo":
                include("cargo/salvar-cargo.php");
                break;
            case "editar-cargo":
                include("cargo/editar-cargo.php");
                break;
            default:
                print "<h1>MENU DO EDITOR</h1>";
        }
        ?>
        
    </div>
</div>
<script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
</body>
</html>