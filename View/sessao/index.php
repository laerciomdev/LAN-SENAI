<?php require_once("../../Model/conexao.php") ?>
<?php session_start(); ?>


<?php

$inserir_Sessao = "SELECT * FROM usuarios WHERE tempoSessao IS NULL AND fk_cargo = 2";

$operacao_inserir = mysqli_query($conectar, $inserir_Sessao);

if (!$operacao_inserir) {
    die("Erro no banco " . mysqli_errno($conectar));
}
?>

<?php

$inserir_Sessao2 = "SELECT * FROM maquinas WHERE statusMaquina = 'Ativo'";

$operacao_inserir2 = mysqli_query($conectar, $inserir_Sessao2);

if (!$operacao_inserir2) {
    die("Erro no banco " . mysqli_errno($conectar));
}
?>

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
<a href="../ZonaAdmin/index.php">Voltar</a> <br>
</head>

<body>

    <center>
        <form method="post" action="../../Controller/iniciarSessao.php">

            <select name="idUsuario">
                <option disabled selected>Escolha um cliente</option>
                <?php
                while ($linha_select = mysqli_fetch_assoc($operacao_inserir)) {
                ?>
                    <option value="<?php echo $linha_select["idUsuario"] ?>"> <?php echo $linha_select["nomeCompleto"] ?> </option>
                <?php
                }
                ?>
            </select><br><br>

            <select name="idMaquina">
                <option disabled selected> Escolha uma Máquina  </option>
                <?php
                while ($linha_select2 = mysqli_fetch_assoc($operacao_inserir2)) {
                ?>
                    <option value="<?php echo $linha_select2["idMaquina"] ?>"> <?php echo $linha_select2["idMaquina"] ?> - <?php echo $linha_select2["tipoMaquina"] ?> </option>
                <?php
                }
                ?>
            </select> <br><br>

            <input type="time" name="tempoSessao">

            <input type="submit" value="Iniciar sessão">
        </form>

    </center>


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <!-- Materialize js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>