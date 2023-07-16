<?php
session_start();

function get_total_all_records()
{
    include('conex.php');

    $stmt = $connection->prepare("SELECT * FROM Alunos");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $stmt->rowCount();
}

if (empty($_SESSION)) {
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
    <link rel="stylesheet" href="../css/videoportrait.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Brasil Concursos</title>
</head>

<body>
    <header>
        <div id="logo">
            <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
        </div>
        <!-- menu-->


        <nav>
            <a href="/html/pesquisa.html">Cursos</a>
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
            <iframe id="principal-video" width="560" height="500" src="https://www.youtube.com/embed/rdAIUcPqpTY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

            <div id="video-descricao">
                <button style="float: right; padding:1px;" id="seta">&#9660;</button>
                <div id="conteudo">
                    <h3 style="font-size: 25px; margin-left:20px;">AULA 1: DESCRIÇÂO DOS ELEMENTOS</h3>
                    <div style="display:flex; flex-direction:row;"><img id="fotovideo" src="../img/clenio.jpg" alt="" srcset=""><span style="font-size:20px; margin-top:50px; margin-left:15px;">Clenio Emidio</span> </div>
                    <br><br>
                    <h3 style="font-size: 25px; margin-left:20px;">DESCRIÇÂO:</h3>
                    <br>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea quidem harum, unde placeat voluptas autem natus nobis? Pariatur facere quasi est obcaecati, illum aliquam sunt eum corrupti, enim exercitationem expedita?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero repudiandae aliquid accusamus illum. Quae, sapiente. Enim laboriosam magni temporibus quibusdam nulla. Quibusdam, odio nulla. Autem deleniti unde molestiae quasi delectus!</p>
                </div>
            </div>

            <form action="coment_ajax.php" method="post" id="formulario-comentario">
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
                <a href="#" onclick="mudarvideo('https://www.youtube.com/embed/rdAIUcPqpTY', 'testando', 'tetskjdfokjdfgowkdejf'); ">
                    <div class="video">
                        <img src="../img/thumb/excel.png" alt="Vídeo 1">
                        <div>
                            <h4> Excel aula 1</h4>
                            <p>Descrição do Video</p>
                        </div>
                    </div>
                </a>

                <a href="#" onclick="mudarvideo('https://www.youtube.com/embed/cveufkhb-RA', 'testando', 'Descrição do Vídeo 1'); ">
                    <div class="video">
                        <img src="../img/thumb/excel 02.png" alt="Vídeo 1">
                        <div>
                            <h4>Excel aula 2</h4>
                            <p>Descrição do Video</p>
                        </div>
                    </div>
                </a>

                <a href="#" onclick="mudarvideo('https://www.youtube.com/embed/hpayJq30ax4', 'testando', 'Descrição do Vídeo 1'); ">
                    <div class="video">
                        <img src="../img/thumb/excel 02.png" alt="Vídeo 1">
                        <div>
                            <h4> Excel aula 3</h4>
                            <p>Descrição do Video</p>
                        </div>
                    </div>
                </a>

                <a href="#" onclick="mudarvideo('https://www.youtube.com/embed/QOiwGrjwSbY', 'testando', 'Descrição do Vídeo 1'); ">
                    <div class="video">
                        <img src="../img/thumb/excel 02.png" alt="Vídeo 1">
                        <div>
                            <h4> Vídeo 4</h4>
                            <p>Descrição do Video</p>
                        </div>
                    </div>
                </a>

                <a href="#" onclick="mudarvideo('', 'testando', 'Descrição do Vídeo 1'); ">
                    <div class="video">
                        <img src="../img/thumb/excel 02.png" alt="Vídeo 1">
                        <div>
                            <h4> Vídeo 5</h4>
                            <p>Descrição do Video</p>
                        </div>
                    </div>
                </a>

                <a href="#" onclick="mudarvideo('', 'testando', 'Descrição do Vídeo 1'); ">
                    <div class="video">
                        <img src="../img/thumb/excel 02.png" alt="Vídeo 1">
                        <div>
                            <h4> Vídeo 6</h4>
                            <p>Descrição do Video</p>
                        </div>
                    </div>
                </a>

                <a href="#" onclick="mudarvideo('', 'testando', 'Descrição do Vídeo 1'); ">
                    <div class="video">
                        <img src="../img/thumb/excel 02.png" alt="Vídeo 1">
                        <div>
                            <h4> Vídeo 7</h4>
                            <p>Descrição do Video</p>
                        </div>
                    </div>
                </a>
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
        $(document).ready(function() {
            $('#formulario-comentario').submit(function(event) { //Verifica o formulário
                event.preventDefault(); // impede o envio do action padrão

                var formData = $(this).serialize(); //serializa os dados

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        if (response === 'successo') {
                            loadComments(); //Caso retorne sucesso , é executada a função que carrega os comentários
                        } else {
                            alert('Erro .');
                        }
                    }
                });
            });

            loadComments();

            function loadComments() {
                $.get('get_comments.php', function(response) {
                    $('#comentarios-container').html(response);
                });
            }
        });
    </script>
</body>

</html>
