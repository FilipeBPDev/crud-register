<?php
switch ($_REQUEST["acao"]) {
    case "cadastrar":
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES ('{$nome}', '{$email}', '{$senha}', '{$data_nasc}')"; # => Query

        $res = $conn->query($sql);
        if ($res == true) {
            echo "<script>alert('Cadastrado com sucesso!');</script>";
            echo "<script>location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar!');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }
        break;
    case "editar":
        $id = $_POST["id"];
        $sql_senha = "SELECT senha FROM usuarios WHERE id={$id}";
        $res_senha = $conn->query($sql_senha);
        $row_senha = $res_senha->fetch_object();
        $senha_antiga = md5($_POST["senha-antiga"]);
        $senha_armazenada = $row_senha->senha;

        if ($senha_antiga != $senha_armazenada) {
            echo "<script>alert('Senha antiga incorreta!');</script>";
            echo "<script>location.href='?page=listar';</script>";
            exit; // Encerra a execução do código para evitar que o código de atualização seja executado
        }

        $nova_senha = md5($_POST["nova-senha"]);
        $conf_nova_senha = md5($_POST["conf-nova-senha"]);
        if ($nova_senha != $conf_nova_senha) {
            echo "<script>alert('As senhas digitadas nos campos Nova Senha e Confirmar Nova Senha não são iguais.');</script>";
            echo "<script>location.href='?page=listar';</script>";
            exit; // Encerra a execução do código se as senhas não forem iguais
        }

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);
        $data_nasc = $_POST["data_nasc"];

        $sql = "UPDATE usuarios SET
                    nome = '{$nome}',
                    email = '{$email}',
                    senha = '{$senha}',
                    data_nasc = '{$data_nasc}'
                WHERE
                id =".$_REQUEST["id"];

        $res = $conn->query($sql);
        if ($res == true) {
            echo "<script>alert('Editado com sucesso!');</script>";
            echo "<script>location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Erro ao editar!');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }
        break;
    case "excluir":
        $sql = "DELETE FROM usuarios WHERE id=" . $_REQUEST["id"];
        $res = $conn->query($sql);
        if ($res == true) {
            echo "<script>alert('Excluído com sucesso!');</script>";
            echo "<script>location.href='?page=listar';</script>";
        } else {
            echo "<script>alert('Erro ao excluir!');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }
        break;
}
