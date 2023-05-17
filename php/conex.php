<?php 

$conn = mysqli_connect("localhost","root","","db_projeto");

if(!$conn){
    echo("Não foi possivel estabelecer conexão com o banco de dados".mysqli_error($conn));
}

?>