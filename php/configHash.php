<?php
include_once('conex.php'); // Adiciona o ponto e vírgula aqui

$email = 'admin@gmail.com'; // Corrige a variável para $email

$sql = "SELECT senha FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email); // Corrige para $email
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $senhaHash = $row['senha'];
    
    $config = array(
        'admin_email' => 'admin@gmail.com',
        'admin_password' => $senhaHash
    );
} 
?>
