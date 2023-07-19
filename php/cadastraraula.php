<?php
include_once('conex.php');
session_start();

$id = $_SESSION['idUsuarios'];

$query = "SELECT tipo_usuario FROM Usuarios Where idUsuarios = '$id';";


$resultado = $conn->query($query);
$row = $resultado->fetch_assoc();
if ($row['tipo_usuario'] == 1){
}else {
    header('Location: aluno.php');
exit();
}

if (isset($_POST['envia'])) {
    if (isset($_GET['id'])) {
        $idCurso = $_GET['id'];
        echo $idCurso;
        $aula = $_POST["aula"];
        $titulo = $_POST["titulo"];
        $descricao = $_POST["descricao"];

        include_once('conex.php');

        $thumbDestino = '../img/thumb/' . $_FILES["thumbnail"]["name"];
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $thumbDestino);
        $caminhoThumbnail = $conn->real_escape_string($thumbDestino);

        $sql = "INSERT INTO `Video` (`link`, `titulo`, `descrição`, `thumb`, `Cursos_idCursos`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $aula, $titulo, $descricao, $caminhoThumbnail, $idCurso);
        $stmt->execute();
        header('location:professor.php');
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>cadastre o seu curso</title>
    <style>
        @charset "utf-8";
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
       

        body{
    background: rgb(83,121,121);
    background: linear-gradient(17deg, rgba(83,121,121,1) 22%, rgba(21,70,70,1) 83%);
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
        }
        *{
    margin: 0px;
    padding: 0px;
    font-family: 'Poppins';
}
 img {
 height: 120px;
 padding: 0;
 margin-top:-40px;
} 

 
 header{
    margin-top: 10px;
 
 }
 nav{
    display: flex;
    justify-content: space-around;
 }
 nav>a{
    color: #fff;
    text-decoration: none;
    margin: 15px;
    font-size: 21px;
    transition: .3s;
 }
h2{
    color: rgb(83,121,121);
    text-align: center;
}

#entrar{
    border-radius: 25px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    height: 45px;
    width: 140px;
    border: none;
    background-color: #fff;
    color: #000000;
}
#entrar:hover{
    background-color: rgb(56, 214, 161);
    outline: none;
    border: none;
    transition: 0.5s;
}


  
  .bx  {
      width: 25px;
      font-size: 20px;
  }
  main{
    display: flex;
    flex-direction: column;
    justify-self: center;
    align-items: center;
 

}
form{
    width: 550px;
    height: 650px;
    align-items: center;
    background-color: #fff;
    display: flex;
    flex-direction: column;
    border-radius: 15px;
}
.dados{
    margin: 25px 25px;
}
button{
    width: 150px;
    height: 35px;
    border-radius: 15px;
    background-color: rgb(56, 214, 161);
    border: none;
}
button :hover{
    border: rgb(56, 214, 161);
    background-color: #fff;
}
  </style>
</head>
<body>
    <header>
    <nav>
       
       <a href="enviaraulas.php"><img src="../img/logo2pequena.png" alt=""></a>
  <h2>Cadastrar cursos</h2>
   <a href="#" style="text-decoration: none;"
   id="entrar"><i class='bx bxs-user'><!-- nome do professor (php) --></i>
</a>
 
   </nav>
    </header>
    <main>
    <h2>Enviar aula</h2>
            <div class="description">
            <!DOCTYPE html>
<html>
<head>
    <title>Upload Video</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="post">
        <label for="aula">Link Vídeo</label>
        <input type="text" name="aula">
        <label for="titulo">Título</label>
        <input type="text" name="titulo">
        <textarea name="descricao" cols="30" rows="10" placeholder="Descrição"></textarea>
        <label for="thumb">Thumbnail</label>
        <img id="thumbnail-preview" src="" alt="" style="max-width: 200px;">
        <input type="file" name="thumbnail" id="thumb" onchange="previewThumbnail()">
        <button type="submit" name="envia">Enviar aula</button>
    </form>

    <script>
        function previewThumbnail() {
            const thumbnailInput = document.getElementById('thumb');
            const thumbnailPreview = document.getElementById('thumbnail-preview');
            thumbnailPreview.src = thumbnailInput.files ? URL.createObjectURL(thumbnailInput.files[0]) : "";
        }
    </script>
</body>
</html>

            </div>
    </main>
</body>
</html>