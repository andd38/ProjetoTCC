<?php
session_start();
include_once('conex.php');
$id = $_SESSION['idUsuarios'];

$sql = "SELECT Cursos.idCursos, Cursos.nome, COUNT(DISTINCT video.idvideo) AS total_videos, SUM(watch.assistido) AS assistidos
FROM Cursos
LEFT JOIN video ON Cursos.idCursos = video.Cursos_idCursos
LEFT JOIN watch ON video.idvideo = watch.video_idvideo AND video.Cursos_idCursos = watch.video_Cursos_idCursos AND watch.Usuarios_idUsuarios = $id
GROUP BY Cursos.idCursos, Cursos.nome";

$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $progressoCursos = array();
    while ($row = $resultado->fetch_assoc()) {
        $cursoId = $row['idCursos'];
        $nomeCurso = $row['nome'];
        $total = $row['total_videos'];  
        $assistidos = $row['assistidos'];
        $progressoCurso = ($total > 0) ? ($assistidos / $total) * 100 : 0;

        $progressoCursos[] = [
            'cursoId' => $cursoId,
            'nomeCurso' => $nomeCurso,
            'progressoCurso' => $progressoCurso
        ];
    }
} else {
    $progressoCursos = array();
}

$conn->close();

echo json_encode($progressoCursos);
?>


