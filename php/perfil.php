<?php
include('conex.php');
if (isset($_GET['key'])) {
    $user = $_GET['key'];
    $query = "SELECT * FROM Usuarios WHERE idUsuarios = $user";
    $resultado = $conn->query($query);

    if ($row = $resultado->fetch_assoc()) {
        $id = $row['idUsuarios'];
        $nome = $row['nome'];
        $data = $row['data_nascimento'];
        $sobre = $row['sobre'];
        $cidade = $row['cidade'];


?>

        <!DOCTYPE html>
        <html lang="pt-BR">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="stylesheet" href="../css/stylealuno.css">
            <link rel="stylesheet" href="../css/alunocelular.css" media="screen and (orientation: portrait)">
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
            <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
            <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

            <title>Brasil Concursos</title>
            <style>
                .sobre{
                    height: 88vh;
                }
               

                .dados,
                .sobre {
                    margin-bottom: 20px;
                }

                h2 {
                    color: white;
                }

                .dados p,
                .sobre p {
                    margin: 5px 0;
                }

                .dados strong {
                    width: 100px;
                    color: aquamarine;
                    display: inline-block;
                }

                .sobre p {
                    text-align: justify;
                    line-height: 1.6;
                }

                span {
                    color: white;
                }

                textarea {
                    resize: none;
                    width: 300px;
                    margin-top: 20px;
                    border-radius: 10px;
                    height: 15vh;
                    color: white;
                    background-color: transparent;
                    border: 2px solid aquamarine;
                    outline: none;
                    padding: 10px;
                    vertical-align: top
                }


                .quadro {
                    padding: 8px;
                    width: 90%;
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    border: 1px solid aquamarine;
                    height: 50vh;
                    border-radius: 5px;

                }

                .quadradinho {
                    width: 15px;
                    height: 15px;
                    background-color: #0b090951;
                    border: 1px solid rgb(47, 151, 146);
                    margin: 5px;


                }


                .tooltip {
                    position: absolute;
                    background-color: #333;
                    color: #fff;
                    padding: 5px;
                    border-radius: 3px;
                    font-size: 12px;
                    z-index: 1;
                    margin-right: 50px;
                    margin-top: -30px;
                    pointer-events: none;
                    opacity: 0;
                    transition: opacity 0.3s;
                }

                .quadradinho:hover .tooltip {
                    opacity: 1;
                }

                .quadradinho-com-info {
                    background-color: aquamarine;
                    color: #fff;

                }

                .img {
                    border-radius: 50%;
                    border-color: aquamarine;
                }

                .conquistas {
                    overflow-y: auto;
                    height: 40vh;
                }

                @media screen and (max-width: 1040px) {
                    .quadro {
                        padding: 8px;
                        width: 90%;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        border: 1px solid aquamarine;
                        height: 60vh;
                        border-radius: 5px;

                    }

                    textarea {
                        resize: none;
                        width: 100%;
                        margin-top: 20px;
                        border-radius: 10px;
                        height: 10vh;
                        margin: auto;
                        color: white;
                        background-color: transparent;
                        border: 2px solid aquamarine;
                        outline: none;
                        padding: 10px;
                        vertical-align: top
                    }

                    textarea {
                        height: 20vh;
                    }

                    .quadro {
                        padding: 8px;
                        width: 90%;
                        display: flex;
                        flex-wrap: wrap;
                        justify-content: center;
                        border: 1px solid aquamarine;
                        height: 100vh;
                        border-radius: 5px;

                    }
                }

            </style>
        </head>

        <body>
            <header class="menu-principal">
                <div id="logo">
                    <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
                </div>
                <nav>
                    <a href="../php/pesquisa.php">Cursos</a>
                    <a href="../html/sobre.html">Quem somos</a>
                    <a href="Contato">Contato</a><!-- api whatsapp -->
                </nav>
                <a href="../php/video.php" style="text-decoration: none;" id="entrar">
                    voltar
                    <span class="material-symbols-outlined">
                        person
                    </span>
                </a>
            </header>
            <header class="mobile">
                <div id="logo">
                    <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
                    <i onclick="acao()" id="menu" class='bx bx-menu'></i>
                </div>
                <div class="nav-menu" id="nav-menu">
                    <div class="btn-user">
                        <a href="../html/login.html">
                            <button id="carrinho">
                                Entrar
                                <span class="material-symbols-outlined">
                                    person
                                </span>
                            </button>
                        </a>
                        <i onclick="acao()" class='bx bx-x' id="X"></i>
                    </div>
                    <nav>
                        <a href="../php/pesquisa.php">Cursos</a>

                        <a href="../html/sobre.html">Quem somos</a>
                        <a href="Contato">Contato</a> <!-- api whatsapp -->
                    </nav>
                </div>
            </header>
            <main>
                <div class="container1">
                    <div class="boxone"><!-- perfil do aluno -->
                        <?php
                        echo "<span style='font-size:40px; font-weight:500; color:white;'> $nome  </span>";
                        ?>
                        <?php
                        $caminhoImagem = $row['imagem'];

                        if (!empty($caminhoImagem)) {
                            echo "<div class='imgdois' style='width: 275px; height: 275px; background-image: url(\"$caminhoImagem\"); background-size: cover; background-position:center; border-radius:50%;'></div>";
                        } else {
                            echo "<div class='img'></div>";
                        }
                        ?>



                    </div>
                    <div class="niveldeplano">
                        <h2>Sobre</h2>
                        <textarea readonly id="areasobre"><?php echo " $sobre"; ?></textarea>
                        <br>
                    </div>
                </div>
                <div class="container2">
                    <div class="sobre">
                        <div class="dados">
                            <?php
                            echo "<h2>Perfil de $nome</h2>";
                            echo "<p><strong>Nome:</strong> $nome</p>";
                            echo "<p><strong style='font-size:20px;'>Data:</strong>$data</p>";
                            echo "<p><strong>Cidade:</strong> $cidade</p>";

                            ?>
                        </div>
                        <div class="sobrevoce">

                        </div>
                    </div>

                </div>
            </main>
    <?php
    } else {
        echo "Usuário não encontrado.";
    }
}
    ?>
    <footer>
    </footer>
    <script src="progresso.js"></script>
    <script src="menu.js"></script>
        </body>

        </html>