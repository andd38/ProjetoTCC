<?php 

if(session_status() !== PHP_SESSION_ACTIVE){
session_start();
}

if(!empty($_POST)){
    include_once("conex.php");

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT id, usuario FROM usuarios WHERE usuario = ? AND senha = ?");
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $login = $stmt->get_result();

    if($login && mysqli_num_rows($login) == 1){
        $row = $login->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['usuario'] = $row['usuario'];
        echo "<p>Sess&atilde;o iniciada com sucesso como {$_SESSION['usuario']}</p>";

       header('location:dash.php');

    } else {
        echo "<p>Utilizador ou password invalidos. Tente novamente</p>";
    }
}

?>