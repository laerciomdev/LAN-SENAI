<?php require_once("../Model/conexao.php") ?>
<?php session_start(); ?>

<?php

    $loginCliente = $_POST["loginCliente"];
    $senhaCliente = $_POST["senhaCliente"];
    $nomeCompleto = $_POST["nomeCompleto"];

    $inserir_produto = "INSERT INTO cliente (loginCliente, senhaCliente, nomeCompleto) VALUES ('$loginCliente','$senhaCliente','$nomeCompleto') ";

    $operacao_inserir = mysqli_query($conectar, $inserir_produto);

    if (!$operacao_inserir) {
        die("Erro no banco " . mysqli_errno($conectar));
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Cadastrado com Sucesso!')
        ;window.location.href=' ../View/cadastroCliente/index.php';</script>";
    }
?>