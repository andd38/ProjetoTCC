<?php
 include('conex.php');
$id = $_GET['id'];
$tipo = $_GET['tipo'];

$deleteComentariosSQL = "DELETE FROM Comentarios WHERE Usuarios_idUsuarios = $id";
$deleteWatchSQL = "DELETE FROM watch WHERE Usuarios_idUsuarios = $id";
$deleteVideoSQL = "DELETE FROM video WHERE Cursos_idCursos IN (SELECT idCursos FROM Cursos WHERE Usuarios_idUsuarios = $id)";
$deleteCursosSQL = "DELETE FROM Cursos WHERE Usuarios_idUsuarios = $id";

if (mysqli_query($conn, $deleteComentariosSQL) &&
    mysqli_query($conn, $deleteWatchSQL) &&
    mysqli_query($conn, $deleteVideoSQL) &&
    mysqli_query($conn, $deleteCursosSQL)) {

    $deleteUsuariosSQL = "DELETE FROM Usuarios WHERE idUsuarios = $id";

    if (mysqli_query($conn, $deleteUsuariosSQL)) {
        mysqli_close($conn);
        if ($tipo == 0) {
            header('Location: alunossearch.php');
            exit();
        } elseif ($tipo == 1) {
            header('Location: professorsearch.php');
            exit();
        }
    } else {
        echo "Erro na exclusão: " . mysqli_error($conn);
    }
} else {
    echo "Erro na exclusão dos registros relacionados: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
