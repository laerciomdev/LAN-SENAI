<?php require_once("../../Model/conexao.php") ?>
<?php session_start(); ?>

<?php

$inserir_usuario = "SELECT * FROM `usuarios` WHERE usuarios.tempoSessao > 0";

$operacao_inserir = mysqli_query($conectar, $inserir_usuario);

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<title>Menu</title>
<a href="../../controller/sair.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">exit_to_app</i></a><br>

</head>

<body>
    <br>

    <a href="../gerenciarClientes/index.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">group_add</i></a>

    <a href="../gerenciarMaquinas/index.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add_to_queue</i></a>

    <a href="../sessao/index.php" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">camera_front</i></a> <br><br><br>





    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Número da máquina</th>
                <th>Usuário na máquina</th>
                <th>Horário de termino</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($linha_select = mysqli_fetch_assoc($operacao_inserir)) {
            ?>
                <tr>

                    <td><?php echo $linha_select["fk_Maquina"] ?></td>
                    <td><?php echo $linha_select["nomeCompleto"] ?></td>
                    <td><?php echo $linha_select["tempoSessao"] ?></td>

                    <td>
                        <a href="../sessao/Crud/editarSessao.php?id=<?php echo $linha_select["idUsuario"] ?>"><i class="material-icons center">edit</i></a>
                    </td>

                    <td>
                        <a href="../sessao/Crud/encerraSessao.php?id=<?php echo $linha_select["idUsuario"] ?>"><i class="material-icons center">exit_to_app</i></a>
                    </td>



                </tr>
            <?php } ?>
        </tbody>
    </table>


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <!-- Materialize js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>