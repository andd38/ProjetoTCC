<?php

if (isset($_GET['id'])) {
    $idPagina = $_GET['id'];
include_once('conex.php');

$sql = "SELECT c.*, u.imagem
FROM Comentarios c
JOIN Usuarios u ON c.Usuarios_idUsuarios = u.idUsuarios
WHERE c.Cursos_idCursos = $idPagina
ORDER BY c.data_comentario DESC;";

$resultado = mysqli_query($conn, $sql);

$comentarios = array();

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $comentarios[] = $linha;
    }

    foreach ($comentarios as $comentario) {
        $imagem = $comentario['imagem'];
        $nome = $comentario['nome'];
        $dataComentario = $comentario['data_comentario'];
        $textoComentario = $comentario['comentario'];

        if (!empty($imagem)) {
            $imagemSrc = $imagem;
        } else {
            $imagemSrc = '../img/thumb/149071.png';
        }

        echo "<div class='comentar'>";
        echo "<img src='$imagemSrc' id='fotinhaa'>";
        echo "<div class='teste'>";
        echo "<div>@" . $nome . "</div>";
        echo "<div>$textoComentario</div>";
        echo "</div>";
        echo "</div><br>";
    }
}}
?>
