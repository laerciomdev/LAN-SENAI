<?php require_once("../../../Model/Conexao.php") ?>
<?php session_start(); ?>

<!-- Inserção no Banco -->

<?php

    $idUsuario = $_GET["id"];

    $alteracao =  "UPDATE usuarios ";
    $alteracao .= "SET fk_Maquina = NULL, tempoSessao = NULL ";
    $alteracao .= "WHERE idUsuario = {$idUsuario} ";

    $operacao_alterar = mysqli_query($conectar, $alteracao);

    if (!$operacao_alterar) {
        die("Erro no banco" . mysqli_errno($conectar));
    } else {
        echo "<script language='javascript' type='text/javascript'>
                   alert('Sessão encerrada com Sucesso!')
                   ;window.location.href='../../ZonaAdmin/index.php';</script>";
    }

?>