<?php require_once("../../../model/conexao.php") ?>
<?php session_start(); ?>

<?php
$idMaquina = $_GET["id"];

$select_maquina = "SELECT * FROM maquinas WHERE idMaquina = $idMaquina ";

$maquina = mysqli_query($conectar, $select_maquina);
if (!$maquina) {
    die("Erro na consulta ao banco " . mysqli_errno($conectar));
}

$linha_maquina = mysqli_fetch_assoc($maquina);

?>

<!-- Inserção no Banco -->

<?php

if (isset($_POST["tipoMaquina"])) {

    $tipoMaquina = $_POST["tipoMaquina"];
    $statusMaquina = $_POST["statusMaquina"];
    $observacao = $_POST["observacao"];

    $alteracao =  "UPDATE maquinas ";
    $alteracao .= "SET tipoMaquina = '{$tipoMaquina}', statusMaquina = '{$statusMaquina}', observacao = '{$observacao}' ";
    $alteracao .= "WHERE idMaquina = {$idMaquina} ";

    $operacao_alterar = mysqli_query($conectar, $alteracao);

    if (!$operacao_alterar) {
        die("Erro no banco" . mysqli_errno($conectar));
    } else {
        echo "<script language='javascript' type='text/javascript'>
                   alert('Editado com sucesso!')
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


    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <center>
                <form action="editar_Maquina.php?id=<?php echo $linha_maquina["idMaquina"] ?>" method="post">
        </div><br><br>

        <select name="tipoMaquina">
            <option value="<?php echo $linha_maquina["tipoMaquina"] ?>"> <?php echo $linha_maquina["tipoMaquina"] ?></option>
            <option value="navegacao">Navegação</option>
            <option value="midia">Midia</option>
            <option value="jogos">Jogos</option>
        </select><br><br>

        <select name="statusMaquina">
            <option value="<?php echo $linha_maquina["statusMaquina"] ?>"> <?php echo $linha_maquina["statusMaquina"] ?></option>
            <option value="Ativo">Ativo</option>
            <option value="Inoperante">Inoperante</option>
        </select><br><br>

        <input type="text" name="observacao" value="<?php echo $linha_maquina["observacao"] ?>">
    </div><br>

    <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar
        <i class="material-icons right">send</i>
    </button>
    </form>

    </center>

    </form>


</body>

</html>