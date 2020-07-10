<?php require_once("../Model/conexao.php") ?>
<?php session_start(); ?>

<?php

if ((isset($_POST['loginAdmin'])) && (isset($_POST['senhaAdmin']))) {
    $loginAdmin = mysqli_real_escape_string($conectar, $_POST['loginAdmin']);
    $senhaAdmin = mysqli_real_escape_string($conectar, $_POST['senhaAdmin']);

    $query = "SELECT * FROM administrador WHERE loginAdmin = '$loginAdmin' && senhaAdmin = '$senhaAdmin' LIMIT 1";
    $executar_query = mysqli_query($conectar, $query);

    if (!$executar_query) {
        die("Falha na consulta do banco");
    }

    $result = mysqli_fetch_assoc($executar_query);

    if (empty($result)) {
        echo "Código e/ou Cargo incorretos!";
    } else if ($_SESSION['loginAdmin'] == "admin") {
        $_SESSION['idAdmin']    = $result ['idAdmin'];
        $_SESSION['loginAdmin'] = $result ['loginAdmin'];
        $_SESSION['senhaAdmin'] = $result ['senhaAdmin'];
        header("Location: ../View/ZonaAdmin/index.php");
    } else {
        header("Location: ../View/index.php");
    }
        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
    } else {
        //Váriavel global recebendo a mensagem de erro
        $_SESSION['loginErro'] = "Usuário ou senha Inválido";
        header("Location: ../View/index.php");
    }

?>