<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $receita = $_POST["receita"];
        $ingredientes = $_POST["ingredientes"];
        $preparo = $_POST["preparo"];
        $tipo = $_POST["tipo"];
        $dificuldade = $_POST["dificuldade"];

        $sql = "INSERT INTO receitas (nome, receita, ingredientes, preparo, tipo, dificuldade) VALUES ('{$nome}', '{$receita}', '{$ingredientes}', '{$preparo}', '{$tipo}', '{$dificuldade}')";

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Cadastro com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;

    case 'editar':
        $receita = $_POST["receita"];
        $ingredientes = $_POST["ingredientes"];
        $preparo = $_POST["preparo"];
        $tipo = $_POST["tipo"];
        $dificuldade = $_POST["dificuldade"];

        $sql = "UPDATE receitas SET 
                    receita='{$receita}',
                    ingredientes='{$ingredientes}',
                    preparo='{$preparo}',
                    tipo='{$tipo}',
                    dificuldade='{$dificuldade}'
                WHERE
                    id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM receitas WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='?page=listar';</script>";
        } else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=listar';</script>";
        }
        break;
}
?>