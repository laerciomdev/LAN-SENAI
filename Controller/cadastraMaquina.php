<?php require_once("../Model/conexao.php") ?>
<?php session_start(); ?>

<?php

$tipoMaquina = $_POST["tipoMaquina"];
$statusMaquina = $_POST["statusMaquina"];

$inserir_pc = "INSERT INTO maquinas (tipoMaquina, statusMaquina) VALUES ('$tipoMaquina', '$statusMaquina') ";

$operacao_inserir = mysqli_query($conectar, $inserir_pc);

if (!$operacao_inserir) {
    die("Erro no banco " . mysqli_errno($conectar));
} else {
    echo "<script language='javascript' type='text/javascript'>
        alert('Computador registrado com Sucesso!')
        ;window.location.href=' ../View/GerenciarMaquinas/index.php';</script>";
}
?>