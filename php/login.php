<?php 

if(isset($_POST['criar'])){
include('conex.php');
$nome = $_POST['nome'];
$email = $_POST['email'];
$pass = $_POST['senha'];

$query = "INSERT INTO alunos VALUES (null, '$nome','$email','$pass','')";

if (mysqli_query($conn, $query)) {
    echo (" Usuario " . $nome . " adicionado com sucesso!<br><br>");
    echo ("Bem vindo(a) " . $nome);
} else {
    echo (" ERRO - O usuario não foi adicionado!".mysqli_error($conn));
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

    $stmt = $conn->prepare("SELECT id,nome, email FROM alunos WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $login = $stmt->get_result();

    if($login && mysqli_num_rows($login) == 1){
        $row = $login->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['nome'] = $row['nome'];
        $_SESSION['email'] = $row['email'];
        echo "<p>Sess&atilde;o iniciada com sucesso como {$_SESSION['nome']}</p>";
        header('location:../php/aluno.php');
    } else {
        echo "<p>Utilizador ou password invalidos. Tente novamente</p>";
    }
}
}
?>