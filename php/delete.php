<?php
include('conex.php');
$id = $_GET['id'];

$sql= "DELETE FROM Usuarios WHERE idUsuarios = $id";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    if ($tipo == 0) {
        header('Location: alunossearch.php');
        exit();
    } elseif ($tipo == 1) {
        header('Location: professorsearch.php');
        exit();
    }
} else {
    echo "Erro na atualização: " . mysqli_error($conn);
}

mysqli_close($conn);
?>