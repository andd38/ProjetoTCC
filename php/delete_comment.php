<?php
include('conex.php');
if (isset($_GET['id'])) {
    $idcoment = $_GET['id'];
    $Sql = "DELETE FROM Comentarios WHERE idComentarios = $idcoment;";
    
    if (mysqli_query($conn, $Sql)) {
        echo 'Comentário excluído com sucesso.';
    } else {
        echo "Erro ao excluir o comentário: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
