<?php
include_once('conex.php'); 

$email = 'admin@gmail.com'; 

$sql = "SELECT senha FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
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
