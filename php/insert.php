<?php
session_start();
if(isset($_POST['insert'])) {
  include_once('conex.php');
  $id = $_SESSION['idUsuarios'];
  $dataNascimento = $_POST['data'];
  $cpf = $_POST['cpf'];
  $cep = $_POST['cep'];
  $telefoneCelular = $_POST['tel-cel'];
  $logradouro = $_POST['logradouro'];
  $bairro = $_POST['bairro'];
  $cidade = $_POST['cidade'];
  $uf = $_POST['uf'];
  $comple = $_POST['complemento'];
  $numero = $_POST['numero'];
  $plano = $_POST['plan'];
  if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
  }
  $dataNascimento = mysqli_real_escape_string($conn, $dataNascimento);
  $cpf = mysqli_real_escape_string($conn, $cpf);
  $cep = mysqli_real_escape_string($conn, $cep);
  $telefoneCelular = mysqli_real_escape_string($conn, $telefoneCelular);
  $logradouro = mysqli_real_escape_string($conn, $logradouro);
  $bairro = mysqli_real_escape_string($conn, $bairro);
  $cidade = mysqli_real_escape_string($conn, $cidade);
  $uf = mysqli_real_escape_string($conn, $uf);
  $comple = mysqli_real_escape_string($conn, $comple);
  $numero = mysqli_real_escape_string($conn, $numero);
  $plano = mysqli_real_escape_string($conn, $plano);

  $sql = "UPDATE Usuarios SET 
          data_nascimento = '$dataNascimento',
          cpf = '$cpf',
          cep = '$cep',
          telefone = '$telefoneCelular',
          logradouro = '$logradouro',
          bairro = '$bairro',
          cidade = '$cidade',
          uf = '$uf',
          complemento = '$comple',
          numero = '$numero',
          plano = '$plano'
          WHERE idUsuarios = '$id'";

  if (mysqli_query($conn, $sql)) {
    header('location:aluno.php?status=sucesso');
  } else {
    echo "Erro ao inserir os dados: " . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>
