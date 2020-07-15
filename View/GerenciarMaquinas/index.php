<?php require_once("../../Model/conexao.php") ?>
<?php session_start(); ?>
<?php

$inserir_maquina = "SELECT * FROM maquinas";

$operacao_inserir = mysqli_query($conectar, $inserir_maquina);

if (!$operacao_inserir) {
    die("Erro no banco " . mysqli_errno($conectar));
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Materialize CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<title>Menu</title>
<a href="../ZonaAdmin/index.php">Voltar</a> <br>
</head>

<body>


    <form method="POST" action="../../Controller/iniciarSessão.php">
        <center>
            <a href="cadastrarMaquina.php" class="waves-effect waves-light btn"><i class="material-icons right">control_point</i>Adicionar uma Máquina</a>
        </center>

        <table class="striped">
            <thead>
                <tr>
                    <th>Número da máquina</th>
                    <th>Tipo da Máquina</th>
                    <th>Estado da Máquina</th>
                    <th>Observações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($linha_select = mysqli_fetch_assoc($operacao_inserir)) {
                ?>
                    <tr>

                        <td><?php echo $linha_select["idMaquina"] ?></td>
                        <td><?php echo $linha_select["tipoMaquina"] ?></td>
                        <td><?php echo $linha_select["statusMaquina"] ?></td>
                        <td><?php echo $linha_select["observacao"] ?></td>
                        <td>
                            <a href="crud/editar_Maquina.php?id=<?php echo $linha_select["idMaquina"]; ?>" type="button" class="btn btn-outline-warning">Editar</a>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </form>


    <?php

    ?>


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <!-- Materialize js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>