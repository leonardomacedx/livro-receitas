<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $cargo = $_POST["cargo"];

        $sql = "INSERT INTO trabalho (cargo) VALUES ('{$cargo}')";

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Cadastro com sucesso');</script>";
            print "<script>location.href='?page=listar-cargo';</script>";
        }else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=listar-cargo';</script>";
        }
        break;
    
    case 'editar':
        $cargo = $_POST["cargo"];

        $sql = "UPDATE trabalho SET 
                    cargo='{$cargo}'
                WHERE
                    id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=listar-cargo';</script>";
        }else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href='?page=listar-cargo';</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM trabalho WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='?page=listar-cargo';</script>";
        }else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=listar-cargo';</script>";
        }
        break;
}
?>