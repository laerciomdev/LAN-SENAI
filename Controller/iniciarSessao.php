<?php require_once("../Model/conexao.php") ?>
<?php session_start(); ?>

<!-- Inserção no Banco -->

<?php

if (isset($_POST["idUsuario"])) {

    $idUsuario = $_POST["idUsuario"];
    $idMaquina = $_POST["idMaquina"];
    $tempoSessao = $_POST["tempoSessao"];
    
    

    $alteracao =  "UPDATE usuarios ";
    $alteracao .= "SET fk_Maquina = {$idMaquina}, tempoSessao = ADDTIME('{$tempoSessao}',CURRENT_TIME) ";
    $alteracao .= "WHERE idUsuario = {$idUsuario} ";

    $operacao_alterar = mysqli_query($conectar, $alteracao);

    if (!$operacao_alterar) {
        die("Erro no banco" . mysqli_errno($conectar));
    } else {
        echo "<script language='javascript' type='text/javascript'>
                   alert('Sessão Iniciada!')
                   ;window.location.href='../View/ZonaAdmin/index.php';</script>";
    }
}

?>
