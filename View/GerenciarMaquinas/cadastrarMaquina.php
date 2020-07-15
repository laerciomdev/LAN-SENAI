<?php require_once("../../Model/conexao.php") ?>
<?php session_start(); ?>

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
<form action="index.php">
    <button style="margin: 10px; border-radius: 8px" type="submit"> Voltar</button> <br>
</form>
</head>

<body>

    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <center>
                <form method="post" action="../../Controller/cadastraMaquina.php">

                    <div id="content" class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix">computer</i></span>
                        </div><br><br>

                        <select style="margin: 10px; border-radius: 8px" name="tipoMaquina">
                            <option value="navegação">Navegação</option>
                            <option value="mídia">Mídia</option>
                            <option value="jogos">Jogos</option>
                        </select><br><br>

                        <select style="margin: 10px; border-radius: 8px" name="statusMaquina">
                            <option value="Ativo">Ativo</option>
                            <option value="Inoperante">Inoperante</option>
                        </select><br><br>
                    </div><br>

                    <button style="margin: 0 auto; border-radius: 8px " class="btn waves-effect waves-light" type="submit" name="action">Cadastrar

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