<?php
session_start();
include('conex.php');

if (isset($_POST['criar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pass = $_POST['senha'];

    $tipoUsuario = 0;

    $query = "INSERT INTO `db_senac`.`Alunos` (`idAlunos`, `nome`, `email`, `senha`, `tipo_usuario`) VALUES (null, '$nome', '$email', '$pass', '$tipoUsuario')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['idAlunos'] = mysqli_insert_id($conn);
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['tipoUsuario'] = $tipoUsuario;

        echo ("Usuário " . $nome . " adicionado com sucesso!<br><br>");
        echo ("Bem-vindo(a) " . $nome);

        if ($tipoUsuario == 0) {
            header('location: cadastroaluno.php');
        } elseif ($tipoUsuario == 1) {
            header('location: cadastroaluno.php');
        }
    } else {
        echo ("ERRO - O usuário não foi adicionado!" . mysqli_error($conn));
    }
}

if (isset($_POST['entrar'])) {
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $stmt = $conn->prepare("SELECT idAlunos, nome, email, tipo_usuario FROM Alunos WHERE email = ? AND senha = ?");
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $login = $stmt->get_result();

        if ($login && mysqli_num_rows($login) == 1) {
            $row = $login->fetch_assoc();
            $_SESSION['idAlunos'] = $row['idAlunos'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['tipoUsuario'] = $row['tipo_usuario'];

            echo "<p>Sessão iniciada com sucesso como {$_SESSION['nome']}</p>";

            if ($_SESSION['tipoUsuario'] == 0) {
                header('location: aluno.php');
            } elseif ($_SESSION['tipoUsuario'] == 1) {
                header('location: enviaraulas.php');
            }
        } else {
            echo "<p>Utilizador ou password inválidos. Tente novamente</p>";
        }
    }
}
?>
