<?php
session_start();
include_once('conex.php');

$id = $_SESSION['idUsuarios'];

$sql = "SELECT Cursos.idCursos, Cursos.nome, COUNT(DISTINCT video.idvideo) AS total_videos, SUM(visualizacao.assistido) AS assistidos
FROM Cursos
LEFT JOIN video ON Cursos.idCursos = video.Cursos_idCursos
LEFT JOIN visualizacao ON video.idvideo = visualizacao.video_idvideo AND video.Cursos_idCursos = visualizacao.video_Cursos_idCursos AND visualizacao.Usuarios_idUsuarios = $id
GROUP BY Cursos.idCursos, Cursos.nome
HAVING assistidos IS NOT NULL";
;

$resultado = $conn->query($sql);

$progressoCursos = array();

if ($resultado && $resultado->num_rows > 0) {
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
}

$conn->close();

echo json_encode($progressoCursos);
?>
