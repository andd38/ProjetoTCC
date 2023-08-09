<?php
session_start();
if (isset($_GET['id'])) {
    $idPagina = $_GET['id'];
    include_once('conex.php');
    $id = $_SESSION['idUsuarios'];
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
            $usuarioComentario = $comentario['Usuarios_idUsuarios'];
            $imagem = $comentario['imagem'];
            $nome = $comentario['nome'];
            $dataComentario = $comentario['data_comentario'];
            $textoComentario = $comentario['comentario'];
            $idcoment = $comentario['idComentarios'];

            if (!empty($imagem)) {
                $imagemSrc = $imagem;
            } else {
                $imagemSrc = '../img/thumb/149071.png';
            }

            echo "<div class='comentar'>";
            echo "<div class='left-section'>";
            echo "<a href='perfil.php?key=$usuarioComentario'><img src='$imagemSrc' id='fotinhaa'></a>";
            echo "<div class='teste'>";
            echo "<div>@" . $nome . "</div>";
            echo "<div class='comentario-texto'>$textoComentario</div>";
            echo "</div>";
            echo "</div>";

            if ($usuarioComentario == $id) {
                echo "<div class='delete-section'>
                    <a class='delete-link' href='javascript:void(0);' onclick='deleteComment($idcoment)'>
                        <svg style='color:red;' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                        </svg>
                    </a>
                </div>";
            }

            echo "</div><br>";
        }
    }
}
?>
