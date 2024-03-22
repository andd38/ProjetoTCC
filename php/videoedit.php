<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['envia'])) {
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

    header("Location: videoedit.php?id=$idCurso");
    $stmt->close();
    $conn->close();
  }
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['atualizado'])) {
  if (isset($_GET['id'])) {
    $idCurso = $_GET['id'];
    $aula = $_POST["videoUrl"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $duracao = $_POST["duracao"];
    $videoid = $_POST['videoid'];

    include_once('conex.php');

    $thumbDestino = '../img/thumb/' . $_FILES["thumbnail"]["name"];
    move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $thumbDestino);
    $caminhoThumbnail = $conn->real_escape_string($thumbDestino);

    $sql = "UPDATE `Video` SET (`link`, `titulo`, `descrição`, `duracao`, `thumb`, `Cursos_idCursos`) VALUES (?, ?, ?, ?, ?, ?) WHERE idvideo = $videoid";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $aula, $titulo, $descricao, $duracao, $caminhoThumbnail, $idCurso);
    $stmt->execute();

    header("Location: videoedit.php?id=$idCurso");
    $stmt->close();
    $conn->close();
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
  <script src="https://apis.google.com/js/api.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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


    main {
      width: 100%;
      display: flex;
      gap: 25px;
      flex-wrap: wrap;
      overflow-y: auto;
      height: 45vh;


    }

    main::-webkit-scrollbar-thumb {
      background-color: aquamarine;
    }

    .container {
      margin-left: 50px;
      margin-top: 25px;
      border-radius: 15px;
      width: 54%;
      margin: auto;
      height: 750px;
      background-color: rgba(0, 0, 0, 0.397);
      padding: 25px;

    }

    button {
      width: 150px;
      height: 35px;
      border-radius: 15px;
      background-color: rgb(56, 214, 161);
      border: none;
    }

    .video img {
      width: 200px;
      max-height: 200px;
      border-radius: 15px;
    }

    .info {
      border: 1px solid aquamarine;
      width: 250px;
      height: 250px;
      border-radius: 15px;
      padding: 15px;

    }

    h4 {
      font-size: 20px;
      color: white;
    }

    h2 {
      color: white;
    }

    #edit {
      color: aquamarine;
    }

    .svg {
      display: flex;
      justify-content: space-between;
    }


    .bx-video-plus {
      font-size: 100px;
      color: white;
    }

    form {
      margin-left: 100px;
      width: 550px;
      height: 750px;
      right: 10px;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.397);
      display: flex;
      flex-direction: column;
      border-radius: 15px;
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
      width: 150px;
      opacity: 0;
      background-color: red;
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
      border-radius: 5px;
      outline: none;
      border: none;
      cursor: pointer;
    }

    label {
      color: white;
    }

    ::placeholder {
      color: white;
    }



    h4 {
      word-wrap: break-word;
    }


    .btn-secondary {
      background-color: aquamarine;
      color: #000000;
      border-radius: 5px;
      padding: 5px;
      width: 150px;
      transition: 0.5s;
      cursor: pointer;
      text-align: center;
      overflow: hidden;
    }

    .btn-secondary:hover {
      border: aquamarine 1px solid;
      background-color: transparent;
      color: #fff;
    }

    #add-video {
      display: flex;
      margin-top: 100px;
      justify-content: center;
    }
  </style>
</head>

<body>
  <header>
    <nav>
      <?php
      include('conex.php');
      if (isset($_GET['id'])) {
        $curso = $_GET['id'];
        $sql = "SELECT * FROM Cursos where idCursos = $curso";

        $resultado = $conn->query($sql);

        if ($row = $resultado->fetch_assoc()) {
      ?>
          <a href="enviaraulas.php" style="margin-top:-45px;"><img src="../img/logo2pequena.png" alt=""></a>
          <h2><?php echo $row['nome'];
           ?></h2>
          <a href="../php/professor.php" style="text-decoration: none; font-family:'Poppins';" id="entrar"><i class='bx bxs-user'>Voltar</i>
          </a>
          <?php
     }
    }

?>
    </nav>
  </header>


  <div class="container">
    <main>
      <?php
      include('conex.php');
      if (isset($_GET['id'])) {
        $id = $_SESSION['idUsuarios'];
        $curso = $_GET['id'];
        $sql = "SELECT *
      FROM Usuarios AS U
      JOIN Video AS V
      JOIN Cursos AS C
      ON U.IdUsuarios = $id AND V.Cursos_idCursos = $curso AND C.idCursos = $curso;";
        $resultado = $conn->query($sql);
        while ($row = $resultado->fetch_assoc()) {
          $videoid = $row['idvideo'];
          echo '<div class="video">';
          echo "<div class='info'>";
          echo '<img src="' . $row['thumb'] . '" alt="Vídeo 1">';
          echo '<h4>' . $row['titulo'] . '</h4>';
          echo '<div class="svg">';
          echo "<a href='editv.php?id=$videoid&id2=$curso''>
          <svg id='edit' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: aquamarine;transform: ;msFilter:;'>
              <path d='M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z'></path>
          </svg>
      </a>";
          echo "<a href='javascript:void(0);' onclick='deleteVideo($videoid)'>
            <svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: red;transform: ;msFilter:;'><path d='M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z'></path></svg>
        </a>";
          echo '</div>';
          echo "</div>";
          echo '</div>';
        }
      }
      ?>
    </main>
    <div id="add-video">
      <button class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#meumodal"></i>Adicionar vídeo</button>
    </div>
  </div>


  <div class="modal fade" id="meumodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.2);">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Atualizar Dados</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <form method="post" enctype="multipart/form-data" autocomplete="off">

            <label for="videoUrl">Insira o link do vídeo do YouTube:</label>
            <input type="text" id="videoUrl" name="videoUrl" placeholder="Insira seu link">
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
        </div>
        <div class="modal-footer">
          <button onclick="getVideoDuration()" type="submit" name="envia" class="btn btn-secondary">Confirmar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    function deleteVideo(videoid) {
      if (confirm('Tem certeza que deseja deletar este vídeo?')) {
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {

              location.reload();
            } else {

              console.error('Erro ao excluir o vídeo: ' + xhr.statusText);
            }
          }
        };

        xhr.open("GET", "delete_video.php?id=" + videoid, true);
        xhr.send();
      }
    }
  </script>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>