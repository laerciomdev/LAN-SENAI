<?php require_once("../../Model/conexao.php") ?>
<?php session_start(); ?>

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
</head>

<body>
    <a href="../ZonaAdmin/index.php"> voltar <a/> <br>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <center>
                <form method="post" action="../../Controller/cadastraCliente.php">

                    <div id="content" class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix">account_circle</i></span>
                        </div>
                        <input type="text" id="code" class="form-control" name="loginCliente" required="" placeholder="Login">
                    </div>

                    <div id="content" class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix">https</i></span>
                        </div>
                        <input type="password" id="code" class="form-control" name="senhaCliente" required="" placeholder="Senha">
                    </div><br>

                    <div id="content" class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix">assignment</i></span>
                        </div>
                        <input type="text" id="code" class="form-control" name="nomeCompleto" required="" placeholder="Nome Completo">
                    </div><br>

                    <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar
                        <i class="material-icons right">send</i>
                    </button>
                </form>
        </div>
        </center>
    </div>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <!-- Materialize js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>