<?php require_once("../../../model/conexao.php") ?>
<?php session_start(); ?>

<?php
$idUsuario = $_GET["id"];
$delete_Usuario = "DELETE FROM usuarios WHERE idUsuario = '{$idUsuario}'";

$delete_Usuario_executar = mysqli_query($conectar, $delete_Usuario);

if (!$delete_Usuario_executar) {
    die("Erro no banco" . mysqli_errno($conectar));
} else {
    echo "<script language='javascript' type='text/javascript'>
                   alert('Removido com sucesso!')
                   ;window.location.href='../index.php';</script>";
}
?>