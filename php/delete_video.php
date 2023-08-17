<?php
include('conex.php');
if (isset($_GET['id'])) {
    $videoid = $_GET['id'];

 
    $deleteWatchSql = "DELETE FROM visualizacao WHERE video_idvideo = $videoid;";
    if (mysqli_query($conn, $deleteWatchSql)) {
        echo 'Registros de visualizaçâo excluídos com sucesso.';
    } else {
        echo "Erro ao excluir registros de watch: " . mysqli_error($conn);
    }

    $deleteVideoSql = "DELETE FROM Video WHERE idvideo = $videoid;";
    if (mysqli_query($conn, $deleteVideoSql)) {
        echo 'Video excluído com sucesso.';
    } else {
        echo "Erro ao excluir o Video: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    exit(); 
}
?>
