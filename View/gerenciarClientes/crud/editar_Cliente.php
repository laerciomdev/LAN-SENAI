<?php require_once("../../../model/conexao.php") ?>
<?php session_start(); ?>

<?php
$idUsuario = $_GET["id"];

$select_Usuario = "SELECT idUsuario, loginUsuario, senhaUsuario, nomeCompleto, fk_cargo, idCargo, nomeCargo
FROM usuarios 
INNER JOIN cargo 
ON usuarios.fk_cargo = cargo.idCargo
WHERE idUsuario = $idUsuario ";

$Usuario = mysqli_query($conectar, $select_Usuario);
if (!$Usuario) {
    die("Erro na consulta ao banco " . mysqli_errno($conectar));
}

$linha_Usuario = mysqli_fetch_assoc($Usuario);

?>

<!-- Inserção no Banco -->

<?php

if (isset($_POST["loginUsuario"])) {

    $loginUsuario = $_POST["loginUsuario"];
    $senhaUsuario = $_POST["senhaUsuario"];
    $nomeCompleto = $_POST["nomeCompleto"];
    $cargo = $_POST["cargo"];

    $alteracao =  "UPDATE usuarios ";
    $alteracao .= "SET loginUsuario = '{$loginUsuario}', senhaUsuario = '{$senhaUsuario}', nomeCompleto = '{$nomeCompleto}', fk_cargo = '{$cargo}' ";
    $alteracao .= "WHERE idUsuario = {$idUsuario} ";

    $operacao_alterar = mysqli_query($conectar, $alteracao);

    if (!$operacao_alterar) {
        die("Erro no banco" . mysqli_errno($conectar));
    } else {
        echo "<script language='javascript' type='text/javascript'>
                   alert('Dados Alterados com sucesso!')
                   ;window.location.href='../index.php';</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>

    <title>Novo</title>
    <a href="../index.php">Voltar</a> <br>
</head>

<body>

    <form action="editar_Cliente.php?id=<?php echo $linha_Usuario["idUsuario"] ?>" method="post">
        <div class="col-4">
            <span>Login</span><br>
            <input type="text" name="loginUsuario" value="<?php echo $linha_Usuario["loginUsuario"] ?>"><br>

            <span>Senha</span><br>
            <input type="text" name="senhaUsuario" value="<?php echo $linha_Usuario["senhaUsuario"] ?>"><br>

            <span>Nome completo</span><br>
            <input type="text" name="nomeCompleto" value="<?php echo $linha_Usuario["nomeCompleto"] ?>"><br>

            <span> Nível de acesso </span><br>
            <select name="cargo">
                <option hidden value="<?php echo $linha_Usuario["fk_cargo"] ?>"> <?php echo $linha_Usuario["nomeCargo"] ?> </option>
                <option value="1"> Administrador </option>
                <option value="2"> Cliente </option>
            </select><br><br>

            <br><br>
            <div id="salva" class="groupButtons">
                <input type="submit" name="action" class="btn btn-outline-success" value="Salvar">
            </div>
        </div>
    </form>


</body>

</html>