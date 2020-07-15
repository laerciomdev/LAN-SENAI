<?php require_once("../../../model/conexao.php") ?>
<?php session_start(); ?>

<?php
$idMaquina = $_GET["id"];
$delete_maquina = "DELETE FROM maquinas WHERE idMaquina = {$idMaquina} ";

$delete_maquina_executar = mysqli_query($conectar, $delete_maquina);

if (!$delete_maquina_executar) {
    die("Erro no banco" . mysqli_errno($conectar));
} else {
    echo "<script language='javascript' type='text/javascript'>
                   alert('Máquina removida com sucesso!')
                   ;window.location.href='../index.php';</script>";
}
?>