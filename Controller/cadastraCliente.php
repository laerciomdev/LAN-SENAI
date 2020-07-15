<?php require_once("../Model/conexao.php") ?>
<?php session_start(); ?>

<?php

    $loginUsuario = $_POST["loginUsuario"];
    $senhaUsuario = $_POST["senhaUsuario"];
    $nomeCompleto = $_POST["nomeCompleto"];
    $cargo = $_POST["cargo"];

    $inserir_produto = "INSERT INTO usuarios (loginUsuario, senhaUsuario, nomeCompleto, fk_cargo) VALUES ('$loginUsuario','$senhaUsuario','$nomeCompleto', $cargo) ";

    $operacao_inserir = mysqli_query($conectar, $inserir_produto);

    if (!$operacao_inserir) {
        die("Erro no banco " . mysqli_errno($conectar));
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Cadastrado com Sucesso!')
        ;window.location.href=' ../View/gerenciarClientes/index.php';</script>";
    }
?>