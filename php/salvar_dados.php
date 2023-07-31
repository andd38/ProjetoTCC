<?php
include_once('conex.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_SESSION['idUsuarios'];
    
    
    $data = json_decode(file_get_contents('php://input'), true);
   

  
    $videoId = $data['videoId'];
    $curso = $data['curso'];

    $stmt_check = $conn->prepare("SELECT idwatch FROM watch WHERE video_idvideo = ? AND video_Cursos_idCursos = ? AND Usuarios_idUsuarios = ?");
    $stmt_check->bind_param("iii", $videoId, $curso, $usuario);
    $stmt_check->execute();
    $stmt_check->store_result();

   
    if ($stmt_check->num_rows > 0) {
        echo "Registro já existente. Nenhuma inserção necessária.";
    } else {
     
        $watched = $data['watched'];
        $assistido = $watched ? 1 : 0;

        $stmt_insert = $conn->prepare("INSERT INTO watch (video_idvideo, video_Cursos_idCursos, Usuarios_idUsuarios, assistido) VALUES (?, ?, ?, ?)");
        $stmt_insert->bind_param("iiii", $videoId, $curso, $usuario, $assistido);

        if ($stmt_insert->execute()) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $conn->error;
        }

        $stmt_insert->close();
    }

    $stmt_check->close();
    $conn->close();
}
?>
