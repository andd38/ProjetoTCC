<?php
include_once('conex.php');
session_start();

if (isset($_POST['coment'])) {
    $id = $_SESSION['idAlunos'];
    $nome = $_SESSION['nome'];
    $coment = mysqli_real_escape_string($conn, $_POST['coment']);

    $sql = "INSERT INTO Comentarios VALUES (null, '$coment', '$id', '$nome', now())";

    $exec = mysqli_query($conn, $sql);

    if ($exec) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>
