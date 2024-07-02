<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $tipo = $_POST["tipo"];

        $sql = "INSERT INTO categoria (tipo) VALUES ('{$tipo}')";

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Cadastro com sucesso');</script>";
            print "<script>location.href='?page=listar-categoria';</script>";
        }else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=listar-categoria';</script>";
        }
        break;
    
    case 'editar':
        $tipo = $_POST["tipo"];

        $sql = "UPDATE categoria SET 
                    tipo='{$tipo}',
                WHERE
                    id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=listar-categoria';</script>";
        }else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href='?page=listar-categoria';</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM categoria WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='?page=listar-categoria';</script>";
        }else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=listar-categoria';</script>";
        }
        break;
}
?>