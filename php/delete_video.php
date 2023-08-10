<?php
include('conex.php');
if (isset($_GET['id'])) {
    $videoid = $_GET['id'];
    $Sql = "DELETE FROM Video WHERE idvideo = $videoid;";
    
    if (mysqli_query($conn, $Sql)) {
        echo 'Video excluído com sucesso.';
    } else {
        echo "Erro ao excluir o Video: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);
    exit(); 
}
?>