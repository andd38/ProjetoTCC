<?php 

if(isset($_POST['criar'])){
    session_start();
    include('conex.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pass = $_POST['senha'];

    $query = "INSERT INTO `db_senac`.`Alunos` (`idAlunos`, `nome`, `email`, `senha`) VALUES (null, '$nome', '$email', '$pass')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['idAlunos'] = mysqli_insert_id($conn); //método top novo que coleta id assim que faz o cadastro para usar na sessão
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;

        echo ("Usuário " . $nome . " adicionado com sucesso!<br><br>");
        echo ("Bem-vindo(a) " . $nome);

        header('location: cadastroaluno.php');
    } else {
        echo ("ERRO - O usuário não foi adicionado!" . mysqli_error($conn));
    }
}

if(isset($_POST['entrar'])){

if(session_status() !== PHP_SESSION_ACTIVE){
session_start();
}

if(!empty($_POST)){
    include_once("conex.php");

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT idAlunos,nome, email FROM Alunos WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $login = $stmt->get_result();

    if($login && mysqli_num_rows($login) == 1){
        $row = $login->fetch_assoc();
        $_SESSION['idAlunos'] = $row['idAlunos'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = $row['email'];
        echo "<p>Sess&atilde;o iniciada com sucesso como {$_SESSION['nome']}</p>";
        header('location:aluno.php');
    } else {
        echo "<p>Utilizador ou password invalidos. Tente novamente</p>";
    }
}
}
?>