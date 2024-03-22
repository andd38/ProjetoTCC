<?php 

$hostname = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'db_senac';
$conn = mysqli_connect($hostname, $usuario, $senha, $banco);

if (!$conn) {
    echo ("Não foi possivel estabelecer a conexão com o banco MySQL! ");
    exit;
}
?>