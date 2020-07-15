<?php require_once("../Model/conexao.php") ?>

<?php
session_start();
unset($_SESSION['idAdmin'],
$_SESSION['loginAdmin'],
$_SESSION['senhaAdmin']);
$_SESSION['logindeslogado'] = "Deslogado com sucesso";
//redirecionar o usuario para a página de login
echo "<script language='javascript' type='text/javascript'>
        alert('Deslogado com Sucesso!')
        ;window.location.href='../View/index.php';</script>";

?>
