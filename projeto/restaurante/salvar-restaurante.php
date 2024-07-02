<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $tipo = $_POST["tipo"];
        $contato = $_POST["contato"];
        $numero = $_POST["numero"];

        $sql = "INSERT INTO restaurante (nome, tipo, contato, numero) VALUES ('{$nome}', '{$tipo}', '{$contato}', '{$numero}')";

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Cadastro com sucesso');</script>";
            print "<script>location.href='?page=listar-restaurante';</script>";
        }else {
            print "<script>alert('Não foi possivel cadastrar');</script>";
            print "<script>location.href='?page=listar-restaurante';</script>";
        }
        break;
    
    case 'editar':
        $nome = $_POST["nome"];
        $tipo = $_POST["tipo"];
        $contato = $_POST["contato"];
        $numero = $_POST["numero"];

        $sql = "UPDATE restaurante SET 
                    nome='{$nome}',
                    tipo='{$tipo}',
                    contato='{$contato}',
                    numero='{$numero}'
                    WHERE
                        id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=listar-restaurante';</script>";
        }else {
            print "<script>alert('Não foi possivel editar');</script>";
            print "<script>location.href='?page=listar-restaurante';</script>";
        }
        break;

    case 'excluir':
        
        $sql = "DELETE FROM restaurante WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='?page=listar-restaurante';</script>";
        }else {
            print "<script>alert('Não foi possivel excluir');</script>";
            print "<script>location.href='?page=listar-restaurante';</script>";
        }
        break;
}
?>