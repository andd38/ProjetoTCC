<?php
session_start();
include_once('conex.php');
$id = $_SESSION['idUsuarios'];

$sql = "SELECT Cursos.idCursos, Cursos.nome, COUNT(*) AS total, SUM(assistido) AS assistidos
        FROM watch
        INNER JOIN Cursos ON watch.video_Cursos_idCursos = Cursos.idCursos
        WHERE watch.Usuarios_idUsuarios = $id
        GROUP BY Cursos.idCursos, Cursos.nome";

$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $progressoCursos = array();
    while ($row = $resultado->fetch_assoc()) {
        $cursoId = $row['idCursos'];
        $nomeCurso = $row['nome'];
        $total = $row['total'];
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


