<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "lanhouse";

$conectar = mysqli_connect($servidor, $usuario, $senha, $banco);

if (mysqli_errno($conectar)) {
    die("Erro ao conectar " . mysqli_errno($conectar));
}

?>