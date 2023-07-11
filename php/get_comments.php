<?php
include_once('conex.php');

$sql = "SELECT c.*, a.imagem FROM Comentarios c JOIN Alunos a ON c.Alunos_idAlunos = a.idAlunos ORDER BY c.data_comentario DESC";
$resultado = mysqli_query($conn, $sql);

$comentarios = array();

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $comentarios[] = $linha;
    }

    for ($i = count($comentarios) - 1; $i >= 0; $i--) {
        $imagem = $comentarios[$i]['imagem'];
        $nome = $comentarios[$i]['nome'];
        $dataComentario = $comentarios[$i]['data_comentario'];
        $comentario = $comentarios[$i]['comentario'];

        if (!empty($imagem)) {
            $imagemSrc = $imagem;
        } else {
            $imagemSrc = '../img/thumb/149071.png';
        }

        echo "<div class='comentar'>";
        echo "<img src='$imagemSrc' id='fotinhaa'>";
        echo "<div class='teste'>";
        echo "<div>@" . $nome . "</div>";
        echo "<div>$comentario</div>";
        echo "</div>";
        echo "</div><br>";
    }
}
?>
