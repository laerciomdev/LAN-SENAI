<?php require_once("../../Model/conexao.php") ?>
<?php session_start(); ?>
<?php

$inserir_Usuario = "SELECT * FROM usuarios INNER JOIN cargo ON usuarios.fk_cargo = cargo.idCargo";

$operacao_inserir = mysqli_query($conectar, $inserir_Usuario);

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
<form action="../ZonaAdmin/index.php">
    <button style="margin: 10px; border-radius: 8px " type="submit"> Voltar</button> <br>
</form>
</head>

<body>

    <center>
    <form method="POST" action="cadastraCliente.php">
    <input type="submit" name="idUsuario" class="btn btn-outline-warning" value="Adicionar Cliente"> 
    </form><br>
    </center>

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th>Login do Cliente</th>
                <th>Nome completo</th>
                <th>Nível de Acesso</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($linha_select = mysqli_fetch_assoc($operacao_inserir)) {
            ?>
                <tr>

                    <td><?php echo $linha_select["loginUsuario"] ?></td>
                    <td><?php echo $linha_select["nomeCompleto"] ?></td>
                    <td><?php echo $linha_select["nomeCargo"] ?></td>
                    <td>
                        <a href="crud/editar_Cliente.php?id=<?php echo $linha_select["idUsuario"]; ?>" type="button" class="btn btn-outline-warning">Editar</a>
                    </td>
                    <td>
                        <a href="crud/deletar_Cliente.php?id=<?php echo $linha_select["idUsuario"]; ?>" type="button" class="btn btn-outline-danger">Deletar</a>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php

    ?>


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <!-- Materialize js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>