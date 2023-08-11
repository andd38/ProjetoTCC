<?php
 include('conex.php');
$idcurso = $_GET['id'];


$deleteCurso = "DELETE FROM Cursos WHERE idCursos = $idcurso";

    if (mysqli_query($conn, $deleteCurso)) {
       header('Location:cursosearch.php');
  
    } 
mysqli_close($conn);
?>
