<?php
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $data_admissao = $_POST["data_admissao"];
        $salario = $_POST["salario"];
        $cargo = $_POST["cargo"];
        $metas = $_POST["metas"];

        $sql = "INSERT INTO funcionario (nome, cpf, data_admissao, salario, cargo, metas) VALUES ('{$nome}', '{$cpf}', '{$data_admissao}', '{$salario}', '{$cargo}', '{$metas}')";

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Cadastro com sucesso');</script>";
            print "<script>location.href='?page=listar-funcionarios';</script>";
        }else {
            print "<script>alert('Não foi possível cadastrar');</script>";
            print "<script>location.href='?page=listar-funcionarios';</script>";
        }
        break;
    
    case 'editar':
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $data_admissao = $_POST["data_admissao"];
        $salario = $_POST["salario"];
        $cargo = $_POST["cargo"];
        $metas = $_POST["metas"];

        $sql = "UPDATE funcionario SET 
                    nome='{$nome}',
                    cpf='{$cpf}',
                    data_admissao='{$data_admissao}',
                    salario='{$salario}',
                    cargo='{$cargo}',
                    metas='{$metas}'
                WHERE
                    id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=listar-funcionarios';</script>";
        }else {
            print "<script>alert('Não foi possível editar');</script>";
            print "<script>location.href='?page=listar-funcionarios';</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM funcionario WHERE id=".$_REQUEST["id"];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Excluído com sucesso');</script>";
            print "<script>location.href='?page=listar-funcionarios';</script>";
        }else {
            print "<script>alert('Não foi possível excluir');</script>";
            print "<script>location.href='?page=listar-funcionarios';</script>";
        }
        break;
}
?>