<?php require_once("../Model/conexao.php") ?>

<?php
    session_start();
    unset(
        $_SESSION['idAdmin'],
        $_SESSION['Login'],
        $_SESSION['Senha']
    );   
    $_SESSION['logindeslogado'] = "Deslogado com sucesso";
    //redirecionar o usuario para a página de login
    header("Location: ../View/index.php");

?>
