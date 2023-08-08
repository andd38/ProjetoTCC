<?php
include('conex.php');
if (isset($_GET['id']) && ($_GET['id2']) && ($_GET['id3'])){
$user = $_GET['id'] ;
$coment = $_GET['id2'];
$page = $_GET['id3'];
$sql = "DELETE FROM Comentarios where Usuarios_idUsuarios = $user AND comentario = $coment";
if (mysqli_query($conn,$sql)){
    header('Location:video.php?id='.$page.'');
}

}



?>