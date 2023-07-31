<?php
session_start();
function get_total_all_records()
{
    include('conex.php');

    $stmt = $connection->prepare("SELECT * FROM Usuarios");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $stmt->rowCount();
}

if (empty($_SESSION)) {
    print("<script>location.href='login.php'</script>");
}

if (isset($_GET['id2'])) {
    $idCurso = $_GET['id2'];
    include_once('conex.php');

  
    $sql = "SELECT * FROM Cursos WHERE idCursos = '$idCurso';";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
   
        $row = $resultado->fetch_assoc();
        $nome = $row['nome'];
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleall.css" media="all">
    <link rel="stylesheet" href="../css/portrait.css" media="screen and (orientation : portrait)">
    <link rel="stylesheet" href="../css/video.css">
    <link rel="stylesheet" href="../css/videoportrait.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Brasil Concursos</title>
    <style>
          iframe {
    margin-left: 25px;
    border-radius: 10px;
    max-height: 700px;
    height: 600px;
    width: 100%;
}
    </style>
</head>

<body>
    <header>
        <div id="logo">
            <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
        </div>
        <!-- menu-->


        <nav>
            <a href="../php/pesquisa.php">Cursos</a>
            <a href="Quem somos">Quem somos</a>
            <a href="Contato">Contato</a>
        </nav>
        <!--botão pesquisar-->
        <form action="pesquisar.php" method="post">
            <div class="buttonc">
                <input type="text" id="search" placeholder="Buscar curso...">
                <button type="submit"><i class='bx bx-search-alt-2'></i></button>
            </div>
        </form><!--botao do carrinho de compras-->

        <a href="#" id="carrinho">
            Carrinho
            <span class="material-symbols-outlined">
                shopping_cart
            </span>
        </a>
        <!--botao de entrar na área do aluno-->

        <a href="../php/logout.php" style="text-decoration: none;" id="entrar">Sair<span class="material-symbols-outlined">
                person
            </span>
        </a>


    </header>
    <!--menu versao mobile-->
    <header class="mobile">
        <div id="logo">
            <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
            <!--botão pesquisar-->
            <form action="pesquisar.php" method="post">
                <div class="buttonc">
                    <input type="text" id="search" placeholder="Buscar curso...">
                    <button type="submit"><i class='bx bx-search-alt-2'></i></button>
                </div>
            </form>
            <i onclick="acao()" id="menu" class='bx bx-menu'></i>
        </div>
        <!-- menu-->




        <!--botao do carrinho de compras-->
        <div class="nav-menu" id="nav-menu">
            <div class="btn-user">

                <button id="carrinho">
                    Carrinho
                    <span class="material-symbols-outlined">
                        shopping_cart
                    </span>
                </button>
                <!--botao de entrar na área do aluno-->


                <a href="../php/logout.php" style="text-decoration: none;" id="entrar">Sair<span class="material-symbols-outlined">
                        person
                    </span></button></a>


                <i onclick="acao()" class='bx bx-x' id="X"></i>

            </div>
            <nav>
                <a href="Cursos.html">Cursos</a>
                <a href="CursosGratuitos">Cursos Gratuitos</a>
                <a href="Quem somos">Quem somos</a>
                <a href="Contato">Contato</a>
            </nav>
        </div>
    </header>

    <div id="video-container">
        <main>
            <?php
        if (isset($_GET['id2']) && (($_GET['id1']))) {
    $idCurso = $_GET['id2'];
    $idvideo = $_GET['id1'];
    include_once('conex.php');

    $sql = "SELECT * FROM video WHERE Cursos_idCursos = $idCurso and idvideo = $idvideo;";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
?>
<iframe id="<?php echo $row['idvideo'] ?>" width="560" height="315" src="<?php echo $row['link']; ?>/<?php echo $row['idvideo'] ?>?enablejsapi=1" frameborder="0" allowfullscreen></iframe>


<script>
let videoWatched = false;


function onYouTubeIframeAPIReady() {
  const player = new YT.Player('<?php echo $row['idvideo'] ?>', {
    events: {
      'onStateChange': onPlayerStateChange
    }
  });
}


function onPlayerStateChange(event) {

  if (event.data === YT.PlayerState.ENDED) {
  
    videoWatched = true;

   
    sendDataToServer();
  }
}


function sendDataToServer() {
  console.log('Dados enviados para o servidor:');
  console.log('Vídeo <?php echo $row['idvideo'] ?> assistido:', videoWatched);

  // Objeto com os dados que serão enviados ao servidor
  const data = {
    videoId: '<?php echo $row['idvideo'] ?>',
    watched: videoWatched ,
    curso: '<?php echo $idCurso ?>'
  };

  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'salvar_dados.php', true);
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        console.log('Dados enviados com sucesso!');
      } else {
        console.error('Ocorreu um erro ao enviar os dados.');
      }
    }
  };
  xhr.send(JSON.stringify(data));
}

</script>
<script src="https://www.youtube.com/iframe_api"></script>
            
            <div id="video-descrição">
                <button style="float: right; padding:1px;" id="seta">&#9660;</button>
                <div id="conteudo">
                    <h3 style="font-size: 25px; margin-left:20px;"><?php  echo $row['titulo'];    ?></h3>
                    <div style="display:flex; flex-direction:row;"><img id="fotovideo" src="<?php      ?>" alt="" srcset=""><span style="font-size:20px; margin-top:50px; margin-left:15px;">Clenio Emidio</span> </div>
                    <br><br>
                    <h3 style="font-size: 25px; margin-left:20px;">DESCRIÇÂO:</h3>
                    <br>
                    <p><?php echo $row['descrição'];     ?></p>
                </div>
            </div>

            <form action="coment_ajax.php?id=<?php echo $idCurso ?>" method="post" id="formulario-comentario">
                <h3>Comentários</h3>
                <br>
                <textarea name="coment" id="comentario" placeholder="Digite seu comentário" required></textarea>
                <br>
                <button name="enviar" type="submit">Enviar</button><br><br><br>
           

            <div id="comentarios-container">
                
            </div>
            </form>
        </main>
        

        <div id="sidebar">

            <div id="content">
            <?php
if (isset($_GET['id2'])) {
    $idCurso = $_GET['id2'];

    $sql = "SELECT * FROM `Video` WHERE `Cursos_idCursos` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $idCurso);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $videozinho =  $row['idvideo'];
        echo '<a href="videomore.php?id1=' . $videozinho . '&id2='. $idCurso .'">';
        echo '<div class="video">';
        echo '<img src="' . $row['thumb'] . '" alt="Vídeo 1">'; 
        echo '<div>';
        echo '<h4>' . $row['titulo'] . '</h4>';
        echo '<p>' . $row['descrição'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</a>';
    }
}
?>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#seta").click(function() {
                $("#conteudo").slideToggle();
            });
        });
    </script>
    <script src="video.js"></script>
    <script src="menu.js"></script>
    <script>
    var idPagina = <?php echo $idCurso; ?>; 

$(document).ready(function() {
    $('#formulario-comentario').submit(function(event) { //Verifica o formulário
        event.preventDefault(); // impede o envio do action padrão

        var formData = $(this).serialize(); //serializa os dados

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData + '&id=' + idPagina, // Adiciona o ID da página à data do formulário
            success: function(response) {
                if (response === 'successo') {
                    loadComments(); //Caso retorne sucesso , é executada a função que carrega os comentários
                } else {
                    alert('Erro.');
                }
            }
        });
    });

    loadComments();

    function loadComments() {
        $.get('get_comments.php?id=' + idPagina, function(response) { //Gambiarra que Passa o ID da página para o arquivo get_comments.php
            $('#comentarios-container').html(response);
        });
    }
});
    </script>
      <?php   }}  ?>
</body>

</html>