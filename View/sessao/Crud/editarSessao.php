<?php require_once("../../../Model/Conexao.php") ?>
<?php session_start(); ?>

<?php

$idUsuario = $_GET["id"];

$inserir_Sessao1 = "SELECT * FROM usuarios
INNER JOIN maquinas 
ON usuarios.fk_Maquina = maquinas.idMaquina 
WHERE usuarios.idUsuario = {$idUsuario}";

$operacao_inserir1 = mysqli_query($conectar, $inserir_Sessao1);

$listar = mysqli_fetch_assoc($operacao_inserir1);

if (!$operacao_inserir1) {
    die("Erro no banco " . mysqli_errno($conectar));
}

?>

<?php

$inserir_Sessao2 = "SELECT * FROM maquinas";

$operacao_inserir2 = mysqli_query($conectar, $inserir_Sessao2);

if (!$operacao_inserir2) {
    die("Erro no banco " . mysqli_errno($conectar));
}
?>

<?php

if (isset($_POST["idMaquina"])) {


    $idMaquina = $_POST["idMaquina"];
    $tempoSessao = $_POST["tempoSessao"];



    $alteracao =  "UPDATE usuarios ";
    $alteracao .= "SET fk_Maquina = {$idMaquina}, tempoSessao = ADDTIME('{$tempoSessao}',tempoSessao) ";
    $alteracao .= "WHERE idUsuario = {$idUsuario} ";

    $operacao_alterar = mysqli_query($conectar, $alteracao);

    if (!$operacao_alterar) {
        die("Erro no banco" . mysqli_errno($conectar));
    } else {
        echo "<script language='javascript' type='text/javascript'>
                   alert('Sessão Iniciada!')
                   ;window.location.href='../../ZonaAdmin/index.php';</script>";
    }
}

?>

<!-- Inserção no Banco -->


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<title>Menu</title>
<a href="../../ZonaAdmin/index.php">Voltar</a> <br>
</head>

<body>

    <center>
        <form method="post">

            <select name="idUsuario">
                <option value="<?php echo $listar["idUsuario"] ?>"> <?php echo $listar["nomeCompleto"] ?> </option>
            </select><br><br>

            <select name="idMaquina">
                <option value="<?php echo $listar["idMaquina"] ?>"> <?php echo $listar["idMaquina"] ?> - <?php echo $listar["tipoMaquina"] ?> </option>
                <?php
                while ($linha_select2 = mysqli_fetch_assoc($operacao_inserir2)) {
                ?>
                    <option value="<?php echo $linha_select2["idMaquina"] ?>"> <?php echo $linha_select2["idMaquina"] ?> - <?php echo $linha_select2["tipoMaquina"] ?> </option>
                <?php
                }
                ?>
            </select> <br><br>

            <input type="time" value="00:00:00" name="tempoSessao">

            <input type="submit" value="Iniciar sessão">
        </form>

    </center>


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <!-- Materialize js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>