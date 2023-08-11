<!DOCTYPE html>
<?php
include_once('conex.php');
session_start();

$id = $_SESSION['idUsuarios'];

$query = "SELECT tipo_usuario FROM Usuarios Where idUsuarios = '$id';";

$resultado = $conn->query($query);
$row = $resultado->fetch_assoc();
if ($row['tipo_usuario'] != 1) {
  header('Location: aluno.php');
  exit();
}

if (isset($_POST['envia'])) {
  if (isset($_GET['id'])) {
    $idCurso = $_GET['id'];
    $aula = $_POST["videoUrl"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $duracao = $_POST["duracao"];

    include_once('conex.php');

    $thumbDestino = '../img/thumb/' . $_FILES["thumbnail"]["name"];
    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $thumbDestino);
    $caminhoThumbnail = $conn->real_escape_string($thumbDestino);

    $sql = "INSERT INTO `Video` (`link`, `titulo`, `descrição`, `duracao`, `thumb`, `Cursos_idCursos`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $aula, $titulo, $descricao, $duracao, $caminhoThumbnail, $idCurso);
    $stmt->execute();
    header('Location:professor.php');
  }
}
?>

<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://apis.google.com/js/api.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <title>cadastre o seu curso</title>
  <style>
    @charset "utf-8";
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


    body {
      background: rgb(83, 121, 121);
      background: linear-gradient(17deg, rgba(83, 121, 121, 1) 22%, rgba(21, 70, 70, 1) 83%);
      background-attachment: fixed;
      background-size: cover;
      background-repeat: no-repeat;
    }

    * {
      margin: 0px;
      padding: 0px;
      font-family: 'Poppins';
    }

    img {
      height: 120px;
      padding: 0;
      margin-top: -40px;
    }


    header {
      margin-top: 10px;

    }

    nav {
      display: flex;
      justify-content: space-around;
    }

    nav>a {
      color: #fff;
      text-decoration: none;
      margin: 15px;
      font-size: 21px;
      transition: .3s;
    }

    h2 {
      color: rgb(83, 121, 121);
      text-align: center;
    }

    #entrar {
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

    #entrar:hover {
      background-color: rgb(56, 214, 161);
      outline: none;
      border: none;
      transition: 0.5s;
    }



    .bx {
      width: 25px;
      font-size: 20px;
    }

    main {
      display: flex;
      flex-direction: column;
      justify-self: center;
      align-items: center;


    }

    form {
      width: 550px;
      height: 750px;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.397);
      display: flex;
      flex-direction: column;
      border-radius: 15px;
    }

    .dados {
      margin: 25px 25px;
    }

    button {
      width: 150px;
      height: 35px;
      border-radius: 15px;
      background-color: rgb(56, 214, 161);
      border: none;
    }

    button :hover {
      border: rgb(56, 214, 161);
      background-color: #fff;
    }

    label {
      color: white;
    }

    #veri {
      margin-top: 20px;
    }

    input[type="text"] {
      border-radius: 5px;
      padding: 2px;
      background-color: transparent;
      outline: none;
      border: 1px solid aquamarine;
      color: white;
    }

    textarea {
      resize: none;
      outline: none;
      border: none;
      width: 80%;
      margin-top: 20px;
      background-color: transparent;
      border: 1px solid aquamarine;
      color: white;
      border-radius: 5px;
      vertical-align: top

    }

    #thumbl {
      margin-top: 20px;
    }

    #thumbnail-preview {
      margin-top: 20px;
    }

    form button {
      margin-top: 20px;
    }

    .custom-file-input input[type="file"] {
            position: absolute;
            width: 300px;
            opacity: 0;
            height: 30px;
            cursor: pointer;
        }

        .custom-file-input label {
            display: block;
            pointer-events: none;
            color: black;
            padding: 2px;
            cursor: pointer;
        }
        .custom-file-input {
          background-color: aquamarine;
          color: black;
          margin-top: 15px;
          border-radius:5px ;
          outline: none;
          border: none;
          cursor: pointer;
        }


  </style>
</head>

<body>
  <header>
    <nav>

      <a href="enviaraulas.php"><img src="../img/logo2pequena.png" alt=""></a>
      <h2>Cadastrar cursos</h2>
      <a href="../php/professor.php" style="text-decoration: none; font-family:'Poppins';" id="entrar"><i class='bx bxs-user'>Voltar</i>
      </a>

    </nav>
  </header>
  <main>
    <h2>Enviar aula</h2>
    <div class="description">
      <form action="" enctype="multipart/form-data" method="post">
        <label for="videoUrl">Insira o link do vídeo do YouTube:</label>
        <input type="text" id="videoUrl" name="videoUrl" placeholder="https://www.youtube.com/watch?v=bkWvLQXIDeI">
        <button id="veri" onclick="getVideoDuration(); return false;">VERIFICAR VÍDEO</button>
        <p id="videoDurationText" style="color: white;"></p>
        <label for="titulo">Título</label>
        <input type="text" name="titulo">
        <textarea name="descricao" cols="30" rows="10" placeholder="Descrição"></textarea>
        <label id="thumbl" for="thumb">Thumbnail</label>
        <img id="thumbnail-preview" src="" alt="" style="max-width: 200px;">
        <div class="custom-file-input">
          <input type="file" name="thumbnail" id="thumb" onchange="previewThumbnail()">
          <label for="thumbnail">Escolher arquivo</label>
        </div>
        <input type="hidden" name="duracao" id="duracao">
        <button onclick="getVideoDuration()" type="submit" name="envia">Enviar aula</button>
      </form>


    </div>
  </main>

  <script>
    function getVideoDuration() {
      const videoUrl = document.getElementById("videoUrl").value;
      const videoId = extractVideoId(videoUrl);
      const apiKey = "AIzaSyBIwgOTAW8LQoO9u3a2UCHHv_GFwtjqoaw"; //chave de API do YouTube

      const apiUrl = `https://www.googleapis.com/youtube/v3/videos?id=${videoId}&key=${apiKey}&part=contentDetails`;

      fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
          const videoDuration = data.items[0].contentDetails.duration;
          const formattedDuration = formatDuration(videoDuration);
          document.getElementById('duracao').value = formattedDuration;


          document.getElementById("videoDurationText").innerText = `Video Verificado`;
        })
        .catch(error => console.error("Erro ao coletar Vídeo", error));
    }


    function extractVideoId(url) {
      const match = url.match(/(?:\/embed\/|v=)([a-zA-Z0-9_-]{11})/);
      return match ? match[1] : null;
    }

    function formatDuration(duration) {
      const match = duration.match(/PT(\d+H)?(\d+M)?(\d+S)?/);
      const hours = match[1] ? parseInt(match[1], 10) : 0;
      const minutes = match[2] ? parseInt(match[2], 10) : 0;
      const seconds = match[3] ? parseInt(match[3], 10) : 0;

      return `${hours}h ${minutes}m ${seconds}s`;
    }

    function previewThumbnail() {
      const thumbnailInput = document.getElementById('thumb');
      const thumbnailPreview = document.getElementById('thumbnail-preview');
      thumbnailPreview.src = thumbnailInput.files ? URL.createObjectURL(thumbnailInput.files[0]) : "";

      function submitForm() {
        getVideoDuration();
        setTimeout(function() {
          document.getElementById('enviaForm').submit();
        }, 1000);
      }
    }
  </script>
</body>

</html>