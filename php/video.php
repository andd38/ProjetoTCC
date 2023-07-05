<?php
session_start();

function get_total_all_records(){
include('conex.php');

$stmt = $connection -> prepare("SELECT * FROM Alunos");
$stmt -> execute();
$result = $stmt->fetchAll();
return $stmt -> rowCount();

}

if(empty($_SESSION)){
    print("<script>location.href='login.php'</script>");
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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <title>Brasil Concursos </title>
</head>

<body>
    <header>
        <div id="logo">
            <a href="index.html"><img src="/img/logo2pequena.png" alt=""></a>
        </div>
        <!-- menu-->


        <nav>
            <a href="/html/pesquisa.html">Cursos</a>
            <a href="CursosGratuitos">Cursos Gratuitos</a>
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

        <a href="../php/logout.php" style="text-decoration: none;"
             id="entrar">Sair<span class="material-symbols-outlined">
                person
            </span>
        </a>


    </header>
    <!--menu versao mobile-->
    <header class="mobile">
        <div id="logo">
            <a href="index.html"><img src="img/logo2pequena.png" alt=""></a>
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


                <a href="../php/logout.php" style="text-decoration: none;"
             id="entrar">Sair<span class="material-symbols-outlined">
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
            <iframe id="principal-video" width="560" height="500" src="https://www.youtube.com/embed/rdAIUcPqpTY"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>

            <div id="video-descricao">
                <h3>Excel aula 1</h3><br><br>
                <p>Descrição do curso: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vehicula, libero
                    ut sagittis tristique, nunc nulla dictum mi, vel condimentum purus velit vel mauris.</p>
                <ul>
                    <li>Duração: 5 horas</li>
                    <li>Instrutor: John Doe</li>
                    <li>Categoria: Programação</li>
                </ul>
            </div>

            <div id="comentarios"></div>
            <form action="coment.php" method="post" id="formulario-comentario">
               <h3>Comentários</h3>
                <br>
                <textarea name="coment" id="comentario" placeholder="Digite seu comentário" required></textarea>
                <br>
                <button name="enviar" type="submit">Enviar</button><br><br><br>
                <?php
include_once('conex.php');
$sql = "SELECT * FROM Comentarios";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    
    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo ("<div class='comentar'><text>".$linha['data_comentario']." - ".$linha['nome'].": ".$linha['comentario']."</text></div>");
    }
}
?>
            </form>
        </main>

        <div id="sidebar">

            <div id="content">
                <a href="#"
                    onclick="mudarvideo('https://www.youtube.com/embed/rdAIUcPqpTY', 'testando', 'tetskjdfokjdfgowkdejf'); return false;">

                    <div class="video">
                        <img src="/img/thumb/excel.png" alt="Vídeo 1">
                        <div>
                            <h4> Excel aula 1</h4>
                            <p>Descrição do Video</p>
                        </div>
                    </div>


                    <a href="#"
                        onclick="mudarvideo('https://www.youtube.com/embed/cveufkhb-RA', 'testando', 'Descrição do Vídeo 1'); return false;">
                        <div class="video">
                            <img src="/img/thumb/excel 02.png" alt="Vídeo 1">
                            <div>
                                <h4>Excel aula 2</h4>
                                <p>Descrição do Video</p>
                            </div>
                        </div>
                    </a>

                    <a href="#"
                        onclick="mudarvideo('https://www.youtube.com/embed/hpayJq30ax4', 'testando', 'Descrição do Vídeo 1'); return false;">
                        <div class="video">
                            <img src="/img/thumb/thumbteste3.jpg" alt="Vídeo 1">
                            <div>
                                <h4> Excel aula 3</h4>
                                <p>Descrição do Video</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" onclick="mudarvideo('https://www.youtube.com/embed/QOiwGrjwSbY', 'testando', 'Descrição do Vídeo 1'); return false;">
                        <div class="video">
                            <img src="/img/thumb/thumbteste3.jpg" alt="Vídeo 1">
                            <div>
                                <h4> Vídeo 4</h4>
                                <p>Descrição do Video</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" onclick="mudarvideo('', 'testando', 'Descrição do Vídeo 1'); return false;">
                        <div class="video">
                            <img src="/img/thumb/thumbteste2.jpg" alt="Vídeo 1">
                            <div>
                                <h4> Vídeo 5</h4>
                                <p>Descrição do Video</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" onclick="mudarvideo('', 'testando', 'Descrição do Vídeo 1'); return false;">
                        <div class="video">
                            <img src="/img/thumb/thumbtest1.jpg" alt="Vídeo 1">
                            <div>
                                <h4> Vídeo 6</h4>
                                <p>Descrição do Video</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" onclick="mudarvideo('', 'testando', 'Descrição do Vídeo 1'); return false;">
                        <div class="video">
                            <img src="/img/thumb/thumbteste2.jpg" alt="Vídeo 1">
                            <div>
                                <h4> Vídeo 7</h4>
                                <p>Descrição do Video</p>
                            </div>
                        </div>
                    </a>
            </div>

</body>
<script src="/js/video.js"></script>

</html>