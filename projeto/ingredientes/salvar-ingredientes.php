<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];

        $sql = "INSERT INTO ingredientes (nome) Values ('{$nome}')";

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Cadastro com sucesso');</script>";
            print "<script>location.href='?page=listar-ingredientes';</script>";
        }else {
            print "<script>alert('Não foi possivel cadastrar');</script>";
            print "<script>location.href='?page=listar-ingredientes';</script>";
        }
        break;
    
    case 'editar':
        $nome = $_POST["nome"];

        $sql = "UPDATE ingredientes SET 
                    nome='{$nome}',
                    WHERE
                        id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=listar-ingredientes';</script>";
        }else {
            print "<script>alert('Não foi possivel editar');</script>";
            print "<script>location.href='?page=listar-ingredientes';</script>";
        }
        break;

    case 'excluir':
        
        $sql = "DELETE FROM ingredientes WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='?page=listar-ingredientes';</script>";
        }else {
            print "<script>alert('Não foi possivel excluir');</script>";
            print "<script>location.href='?page=listar-ingredientes';</script>";
        }
        break;
}