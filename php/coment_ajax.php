<?php
include_once('conex.php');
session_start();

if (isset($_GET['id'])) {
    $idPagina = $_GET['id'];
    
if (isset($_POST['coment'])) {
    $id = $_SESSION['idUsuarios'];
    $nome = $_SESSION['nome'];
    $coment = mysqli_real_escape_string($conn, $_POST['coment']);

    $sql = "INSERT INTO Comentarios VALUES (null, '$coment', '$id', '$nome', now(),'$idPagina')";

    $exec = mysqli_query($conn, $sql);

    if ($exec) {
        echo 'successo';
    } else {
        echo 'error';
    }
}

}


?>
