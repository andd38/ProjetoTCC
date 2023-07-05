<?php
session_start();
include_once('conex.php');

if(isset($_POST['enviar'])){
$id = $_SESSION['idAlunos'];
$coment = $_POST['coment'];

if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
  }
}

$coment = mysqli_real_escape_string($conn,$coment );

$sql = "INSERT INTO Comentarios VALUES (null,'$coment','$id')";

if(mysqli_query($conn,$sql)){
    echo 'foi';
    header('location:video.php');
}else {
    echo 'tente novamente';
}
?>