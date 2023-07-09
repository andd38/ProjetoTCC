<?php
if(isset($_POST['update'])) {
  session_start();
  include_once('conex.php');
  $id = $_SESSION['idAlunos'];
  $dataNascimento = $_POST['data'];
  $cpf = $_POST['cpf'];
  $rg = $_POST['rg'];
  $cep = $_POST['cep'];
  $telefoneFixo = $_POST['tel-fix'];
  $telefoneCelular = $_POST['tel-cel'];
  $logradouro = $_POST['logradouro'];
  $bairro = $_POST['bairro'];
  $cidade = $_POST['cidade'];
  $uf = $_POST['uf'];
  $comple = $_POST['complemento'];
  $numero = $_POST['numero'];

  if (!$conn) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
  }

 
  $dataNascimento = mysqli_real_escape_string($conn, $dataNascimento);
  $cpf = mysqli_real_escape_string($conn, $cpf);
  $rg = mysqli_real_escape_string($conn, $rg);
  $cep = mysqli_real_escape_string($conn, $cep);
  $telefoneFixo = mysqli_real_escape_string($conn, $telefoneFixo);
  $telefoneCelular = mysqli_real_escape_string($conn, $telefoneCelular);
  $logradouro = mysqli_real_escape_string($conn, $logradouro);
  $bairro = mysqli_real_escape_string($conn, $bairro);
  $cidade = mysqli_real_escape_string($conn, $cidade);
  $uf = mysqli_real_escape_string($conn, $uf);
  $comple = mysqli_real_escape_string($conn, $comple);
  $numero = mysqli_real_escape_string($conn, $numero);


  $sql = "UPDATE Alunos SET 
          data_nascimento = '$dataNascimento',
          cpf = '$cpf',
          rg = '$rg',
          cep = '$cep',
          telefonefixo = '$telefoneFixo',
          telefone = '$telefoneCelular',
          logradouro = '$logradouro',
          bairro = '$bairro',
          cidade = '$cidade',
          uf = '$uf',
          complemento = '$comple',
          numero = '$numero'
          WHERE idAlunos = '$id'";

 
  if (mysqli_query($conn, $sql)) {
    header('location:aluno.php');
  } else {
    echo "Erro ao inserir os dados: " . mysqli_error($conexao);
  }

  mysqli_close($conn);
}
?>
