<?php require_once("../Model/conexao.php") ?>
<?php session_start(); ?>

<?php

if ((isset($_POST['loginUsuario'])) && (isset($_POST['senhaUsuario']))) {
    $loginUsuario = mysqli_real_escape_string($conectar, $_POST['loginUsuario']);
    $senhaUsuario = mysqli_real_escape_string($conectar, $_POST['senhaUsuario']);

    $query = "SELECT * FROM usuarios WHERE loginUsuario = '$loginUsuario' AND senhaUsuario = '$senhaUsuario'";
    $executar_query = mysqli_query($conectar, $query);

    if (!$executar_query) {
        die("Falha na consulta do banco");
    }

    $result = mysqli_fetch_assoc($executar_query);

    if (empty($result)) {
        echo "<script language='javascript' type='text/javascript'>
        alert('O campo login ou Senha deve ser preenchido')
        ;window.location.href='../View/index.php';</script>";
    } else {
        $_SESSION['idUsuario']    = $result['idUsuario'];
        $_SESSION['loginUsuario'] = $result['loginUsuario'];
        $_SESSION['senhaUsuario'] = $result['senhaUsuario'];
        echo "<script language='javascript' type='text/javascript'>
        alert('Logado com Sucesso!')
        ;window.location.href='../View/ZonaAdmin/index.php';</script>";
    }
} else {
    $_SESSION['loginErro'] = "Usuário ou senha Inválida";
    echo "<script language='javascript' type='text/javascript'>
        alert('Usuário ou senha Inválida')
        ;window.location.href='../View/index.php';</script>";
}

?>