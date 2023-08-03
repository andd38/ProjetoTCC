<?php
include_once('conex.php');
session_start();
$id = $_SESSION['idUsuarios'];

// Consultar os dados dos vídeos assistidos pelo aluno, incluindo a coluna "data" no resultado
$sql = "SELECT Cursos.idCursos, Cursos.nome, COUNT(*) AS total, SUM(assistido) AS assistidos, data_assistido
FROM watch
INNER JOIN Cursos ON watch.video_Cursos_idCursos = Cursos.idCursos
WHERE watch.Usuarios_idUsuarios = $id
GROUP BY Cursos.idCursos, Cursos.nome, data_assistido;
";

$result = $conn->query($sql);

// Montar um array com os dados dos vídeos assistidos
$watchData = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $watchData[] = [
            "idCursos" => $row["idCursos"],
            "nome" => $row["nome"],
            "total" => $row["total"],
            "assistidos" => $row["assistidos"],
            "data_assistido" => $row["data_assistido"], // Adicionando a coluna "data" ao array
        ];
    }
}

// Fechar a conexão com o banco de dados
$conn->close();

// Enviar os dados como resposta JSON
header('Content-Type: application/json');
echo json_encode($watchData);
?>