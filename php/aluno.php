<?php
include_once('conex.php');
session_start();
$id = $_SESSION['idUsuarios'];
$query = "SELECT * FROM Usuarios WHERE idUsuarios = $id";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $tipoUsuario = $row['tipo_usuario'];
    include_once('conex.php');

    if (isset($_GET['status']) && $_GET['status'] === 'sucesso') {
        echo "<div id='successBox' style='display: none; background-color: aquamarine; color: black; padding: 40px; border-radius: 5px; position: fixed; top: 20px; left: 730px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); z-index: 1000;'>
        Cadastro Finalizado
        <div id='progressBar' style='background-color: lightgray; height: 10px; border-radius: 5px; margin-top: 10px;'>
            <div id='progressFill' style='background-color: #FF3D3D; height: 100%; width: 0; border-radius: 5px;'></div>
        </div>
    </div>";
    echo "<script>
        var successBox = document.getElementById('successBox');
        successBox.style.display = 'block';
        var progressBar = document.getElementById('progressFill');
        var duration = 2000; 
        var interval = 50; 

        var width = 0;
        var increment = (interval / duration) * 100;

        var progressInterval = setInterval(function() {
            width += increment;
            progressBar.style.width = width + '%';
            if (width >= 100) {
                clearInterval(progressInterval);
                setTimeout(function() {
                    successBox.style.display = 'none';
                }, 500);
            }
        }, interval);
    </script>";
    }
} else {
}   if (isset($_GET['status']) && $_GET['status'] === 'logado') {
    echo "<div id='successBox' style='display: none; background-color: aquamarine; color: black; padding: 30px; border-radius: 5px; position: fixed; top: 20px; left: 730px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); z-index: 1000;'>
    Sessão iniciada
    <div id='progressBar' style='background-color: lightgray; height: 10px; border-radius: 5px; margin-top: 10px;'>
        <div id='progressFill' style='background-color: #FF3D3D; height: 100%; width: 0; border-radius: 5px;'></div>
    </div>
</div>";
echo "<script>
    var successBox = document.getElementById('successBox');
    successBox.style.display = 'block';
    var progressBar = document.getElementById('progressFill');
    var duration = 2000; 
    var interval = 50; 

    var width = 0;
    var increment = (interval / duration) * 100;

    var progressInterval = setInterval(function() {
        width += increment;
        progressBar.style.width = width + '%';
        if (width >= 100) {
            clearInterval(progressInterval);
            setTimeout(function() {
                successBox.style.display = 'none';
            }, 500);
        }
    }, interval);
</script>";
}
else {
}  
?>
<?php


function get_total_all_records()
{
    include('conex.php');
    $stmt = $connection->prepare("SELECT * FROM Usuarios");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $stmt->rowCount();
}

if (empty($_SESSION)) {
    echo "<script>location.href='../php/login.php'</script>";
}
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
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Brasil Concursos</title>
    <style>
        .progress-bar {
            width: 200px;
            height: 20px;
            border-radius: 10px;
            background-color: #f0f0f0;
            margin-bottom: 10px;
        }

        .progress-fill {
            height: 100%;
            background-color: aquamarine;
        }

        .label {
            margin-bottom: 5px;
        }

        .custom-file-input input[type="file"] {
            position: absolute;
            height: 30px;
            width: 170px;
            left: 80px;
            bottom: 20px;
            cursor: pointer;
            opacity: 0;
        }

        .custom-file-input label {
            display: block;
            pointer-events: none;
        }

        .custom-file-input label:hover {
            color: white;
        }

        .custom-file-input {
            background-color: aquamarine;
            color: #000000;
            border-radius: 5px;
            padding: 5px;
            width: 150px;
            height: 30px;
            transition: 0.5s;
            cursor: pointer;
            margin-top: 20px;
            border: none;
            outline: none;
            text-align: center;
            margin-left: 60px;
        }

        .custom-file-input:hover {
            border: aquamarine 1px solid;
            background-color: transparent;
            color: #fff;
        }

        .formimg {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        input[type="submit"] {
            background-color: aquamarine;
            color: #000000;
            border-radius: 5px;
            padding: 5px;
            width: 100%;
            transition: 0.5s;
            cursor: pointer;
            border: none;
            margin-top: 20px;
            outline: none;
            text-align: center;
        }

        input[type="submit"]:hover {
            border: aquamarine 1px solid;
            background-color: transparent;
            color: #fff;
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

        #ui {
            background-color: aquamarine;
            color: #000000;
            border-radius: 5px;
            padding: 5px;
            width: 150px;
            transition: 0.5s;
            cursor: pointer;
            border: none;
            outline: none;
            text-align: center;
        }

        #ui:hover {
            border: aquamarine 1px solid;
            background-color: transparent;
            color: #fff;
        }

        .modal-footer {
            display: flex;
            justify-content: space-between;
        }

        .modal-dialog {
            width: 100%;
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
            <a href="../php/aluno.php"><img src="../img/logo2pequena.png" alt=""></a>
        </div>
        <nav>
            <a href="../php/pesquisa.php">Cursos</a>
            <a href="../html/sobre.html">Sobre</a>
            <a href="https://wa.me/5561993838031">Contato</a><!-- api whatsapp -->
        </nav>
        <a href="../php/logout.php?status=" style="text-decoration: none;" id="entrar">
            Sair
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
                include('conex.php');
                $nome = $_SESSION['nome'];
                echo "<span style='font-size:40px; font-weight:500; color:white;'> $nome </span>";
                ?>
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['legal'])) {
                    include_once('conex.php');
                    $id = $_SESSION['idUsuarios'];
                    $destino = '../img/alunosimg/' . $_FILES['imagem']['name'];
                    move_uploaded_file($_FILES['imagem']['tmp_name'], $destino);
                    $caminhoImagem = $conn->real_escape_string($destino);
                    $sql = "UPDATE Usuarios SET imagem = '$caminhoImagem' WHERE idUsuarios = $id";
                    $conn->query($sql);
                }

                include_once('conex.php');
                $id = $_SESSION['idUsuarios'];
                $sql = "SELECT imagem FROM Usuarios WHERE idUsuarios = $id";
                $resultado = $conn->query($sql);

                if ($resultado && $resultado->num_rows > 0) {
                    $row = $resultado->fetch_assoc();
                    $caminhoImagem = $row['imagem'];

                    if (!empty($caminhoImagem)) {
                        echo "<div class='imgdois' style='width: 275px; height: 275px; background-image: url(\"$caminhoImagem\"); background-size: cover; background-position:center; border-radius:50% ;'></div>";
                    } else {
                        echo "<div class='img'></div>";
                    }
                } else {
                    echo "<div class='img'></div>";
                }
                ?>
                <button type="button" class="btn btn-secondary" style="position: relative; margin-top:5px;" data-bs-toggle="modal" data-bs-target="#exampleFoto">
                    Alterar
                </button>
                <div class="modal fade" id="exampleFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="background-color: #0000005a;">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Alterar foto</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="rodape"></div>
                                <div class="modal-principal">
                                    <?php
                                    include_once('conex.php');
                                    $id = $_SESSION['idUsuarios'];
                                    $sql = "SELECT imagem FROM Usuarios WHERE idUsuarios = $id";
                                    $resultado = $conn->query($sql);

                                    if ($resultado && $resultado->num_rows > 0) {
                                        $row = $resultado->fetch_assoc();
                                        $caminhoImagem = $row['imagem'];

                                        if (!empty($caminhoImagem)) {
                                            echo "<div class='imgdois' style='width: 275px; height: 275px; background-image: url(\"$caminhoImagem\"); background-size: cover; background-position:center; border-radius:50%;'></div>";
                                        } else {
                                            echo "<div class='img' style='border-radius:50%;'></div>";
                                        }
                                    } else {
                                        echo "<div class='img' style='border-radius:50%;></div>";
                                    }
                                    ?>

                                    <form class="formimg" method="post" enctype="multipart/form-data">
                                        <div class="custom-file-input">
                                            <input type="file" id="fileInput" name="imagem">
                                            <label for="imagem">Escolher arquivo</label>
                                        </div>
                                        <input id="ui" type="submit" name="legal" value="Confirmar">
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="niveldeplano"><!-- informações do curso que o aluno está fazendo -->
                <?php
                include('conex.php');
                $id = $_SESSION['idUsuarios'];
                $sql = "SELECT * FROM Usuarios where idUsuarios = $id";
                $resultado = mysqli_query($conn, $sql);

                if (mysqli_num_rows($resultado) > 0) {
                    while ($linha = mysqli_fetch_assoc($resultado)) {
                ?>
                        <h2>Fale sobre você:</h2>
                        <form action="update.php" class="sobref" method="post">
                            <textarea name="sobre" id="areasobre" placeholder="Fale sobre você..."><?php echo $linha['sobre']; ?></textarea>
                            <br>
                            <input style="width:300px; " class="btn btn-secondary" name="en" type="submit" value="enviar">
                        </form>

                <?php
                    }
                } else {
                    echo 'Nenhum resultado encontrado.';
                }
                ?>
            </div>
            <div class="conquistas">
                <h1>Progresso dos Cursos</h1>

                <div id="cursos-progresso">

                </div>

                <div id="emitir-certificado">

                </div>

            </div>
        </div>
        <div class="container2">
            <div class="sobre"><!-- informações que aluno pode adicionar ou mudar no seu perfil -->
                <h2>Sobre mim</h2>
                <form action="update.php" method="post" autocomplete="off">
                    <?php
                    include('conex.php');
                    $id = $_SESSION['idUsuarios'];
                    $sql = "SELECT * FROM Usuarios where idUsuarios = $id";
                    $resultado = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($resultado) > 0) {
                        while ($linha = mysqli_fetch_assoc($resultado)) {
                    ?>
                            <div class="dados">
                                <p><strong>Nome:</strong> <span><?php echo $linha['nome']; ?></span></p>
                                <p><strong>E-mail:</strong> <span><?php echo $linha['email']; ?></span></p>
                                <p><strong>Cidade:</strong> <span><?php echo $linha['cidade']; ?></span></p>
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#meumodal">
                                    Atualizar dados
                                </button>
                            </div>

                            <div class="sobrevoce">

                            </div>
                            <div>
                            </div>
                            <div class="modal fade t-modal" id="meumodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg ">
                                    <div class="modal-content" style="background-color:  #0000005a;">
                                        <div class="modal-header">

                                            <h1 class="modal-title fs-5" style="color: white;" id="exampleModalLabel" style="color: black;">Atualizar</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" style="color: white;" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="modal-principal" style="color: white;">
                                                <form action="update.php" method="post" autocomplete="off" style="display :flex ; flex-direction:column; align-items:center">
                                                    <label for="name">Nome</label>
                                                    <input type="text" name="nome" id="nome" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['nome']; ?>" required>
                                                    <label for="dt_nascimento">Data de nascimento:*</label>
                                                    <input type="date" name="data" id="data" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['data_nascimento']; ?>" required>
                                                    <br>
                                                    <label for="CPF">CPF:*</label>
                                                    <input type="text" name="cpf" id="cpf" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['cpf']; ?>" required>
                                                    <button type="button" onclick="validarCPF()" id="valida">Validar</button>
                                                    <span style="color: black;" id="validar"></span>
                                                    <br>
                                                    <h6>Informações do Endereço:</h6>
                                                    <label for="cep">CEP:</label>
                                                    <input type="text" name="cep" id="cep" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['cep']; ?>" required>
                                                    <button type="button" onclick="consultarCEP()" id="valida">Consultar</button>
                                                    <div style="display: flex;">
                                                        <p>CEP: <input type="text" id="logradouro" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['logradouro']; ?>" name="logradouro"></p>
                                                        <p>Logradouro: <input type="text" id="bairro" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['bairro']; ?>" name="bairro"></p>
                                                    </div>
                                                    <div style="display: flex;">
                                                        <p>Cidade <input type="text" id="cidade" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['cidade']; ?>" name="cidade"></p>
                                                        <p>UF <input type="text" id="uf" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['uf']; ?>" name="uf"></p>
                                                    </div>
                                                    <p>Complemento <input type="text" id="complemento" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['complemento']; ?>" name="complemento"></p>
                                                    <p>Número <input type="text" id="numero" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['numero']; ?>" name="numero"></p>
                                                    <label for="telefone-celuar">Telefone(celular)*</label>
                                                    <input type="tel" name="tel-cel" style="border: 1px solid aquamarine; background-color:transparent; color:white;" value="<?php echo $linha['telefone']; ?>" id="tel-cel">


                                            </div>
                                    <?php
                                }
                            } else {
                                echo 'Nenhum resultado encontrado.';
                            }
                                    ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="update" class="btn btn-secondary">Confirmar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>

                                        </div>
                </form>
                </form>
            </div>
        </div>
        </div>
        </form>
        </div>
        <div class="historico">
            <h2>Histórico</h2>
            <div class="quadro"></div>
        </div>
        </div>
    </main>
    <footer>
    </footer>

    <script>
        const quadro = document.querySelector('.quadro');
        const totalVideosByDay = {};

        async function fetchDataAndPopulateQuadradinhos() {
            try {
                const response = await fetch('get_watch.php');
                const data = await response.json();
                populateQuadradinhosWithTooltip(data);
            } catch (error) {
                console.error('Erro ao buscar dados:', error);
            }
        }

        function populateQuadradinhosWithTooltip(data) {
            try {
                const quadradinhos = document.querySelectorAll('.quadradinho');

                data.forEach((item) => {
                    const dateAssistido = new Date(item.data_assistido);
                    const dayOfYear = getDayOfYear(dateAssistido);

                    if (!totalVideosByDay[dayOfYear]) {
                        totalVideosByDay[dayOfYear] = 0;
                    }

                    totalVideosByDay[dayOfYear] += item.total;
                });

                Object.keys(totalVideosByDay).forEach((day) => {
                    const totalVideos = totalVideosByDay[day];
                    const dateAssistido = getDateFromDayOfYear(day);

                    const formattedDate = dateAssistido.toLocaleDateString('pt-BR', {
                        month: 'short',
                        day: 'numeric',
                    });

                    const tooltip = document.createElement('span');
                    tooltip.classList.add('tooltip');
                    tooltip.textContent = `${totalVideos} vídeos assistidos em ${formattedDate}`;

                    const quadradinho = quadradinhos[day];
                    quadradinho.addEventListener('mouseenter', () => {
                        quadradinho.appendChild(tooltip);
                    });

                    quadradinho.addEventListener('mouseleave', () => {
                        quadradinho.removeChild(tooltip);
                    });

                    quadradinho.classList.add('quadradinho-com-info');
                });
            } catch (error) {
                console.error('Erro ao buscar dados:', error);
            }
        }

        function getDayOfYear(date) {
            const startOfYear = new Date(date.getFullYear(), 0, 0);
            return Math.floor((date - startOfYear) / (24 * 60 * 60 * 1000));
        }

        function getDateFromDayOfYear(day) {
            const date = new Date();
            date.setMonth(0);
            date.setDate(parseInt(day) + 1);
            return date;
        }

        async function init() {
            for (let i = 0; i < 365; i++) {
                const quadradinho = document.createElement('div');
                quadradinho.classList.add('quadradinho');
                quadro.appendChild(quadradinho);
            }

            await fetchDataAndPopulateQuadradinhos();
        }

        init();
    </script>
    <script src="modal.js"></script>
    <script src="cep.js"></script>
    <script src="progresso.js"></script>
    <script src="menu.js"></script>
</body>

</html>