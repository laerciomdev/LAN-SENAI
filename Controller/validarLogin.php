<?php require_once("../Model/conexao.php") ?>
<?php session_start(); ?>

<?php

if ((isset($_POST['loginAdmin'])) && (isset($_POST['senhaAdmin']))) {
    $loginAdmin = mysqli_real_escape_string($conectar, $_POST['loginAdmin']);
    $senhaAdmin = mysqli_real_escape_string($conectar, $_POST['senhaAdmin']);

    $query = "SELECT * FROM administrador WHERE loginAdmin = '$loginAdmin' && senhaAdmin = '$senhaAdmin'";
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
        $_SESSION['idAdmin']    = $result['idAdmin'];
        $_SESSION['loginAdmin'] = $result['loginAdmin'];
        $_SESSION['senhaAdmin'] = $result['senhaAdmin'];
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