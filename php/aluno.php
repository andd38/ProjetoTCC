
<?php 
session_start();

function get_total_all_records(){
    include('conex.php');
    $stmt = $connection->prepare("SELECT * FROM Usuarios");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $stmt->rowCount();
}

if(empty($_SESSION)){
    echo "<script>location.href='php/login.php'</script>";
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
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Brasil Concursos</title>
</head>
<body>
    <header class="menu-principal">
        <div id="logo">
            <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
        </div>
        <nav>
            <a href="../php/pesquisa.php">Cursos</a>
            <a href="Quem somos">Quem somos</a>
            <a href="Contato">Contato</a>
        </nav>
        <form action="pesquisar.php" method="post">
            <div class="buttonc">
                <input type="text" id="search" placeholder="Buscar curso...">
                <button type="submit"><i class='bx bx-search-alt-2'></i></button>
            </div>
        </form>
        <a href="#" id="carrinho">
            Carrinho
            <span class="material-symbols-outlined">
                shopping_cart
            </span>
        </a>
        <a href="../php/logout.php" style="text-decoration: none;" id="entrar">
            Sair
            <span class="material-symbols-outlined">
                person
            </span>
        </a>
    </header>
    <header class="mobile">
        <div id="logo">
            <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
            <form action="pesquisar.php" method="post">
                <div class="buttonc">
                    <input type="text" id="search" placeholder="Buscar curso...">
                    <button type="submit"><i class='bx bx-search-alt-2'></i></button>
                </div>
            </form>
            <i onclick="acao()" id="menu" class='bx bx-menu'></i>
        </div>
        <div class="nav-menu" id="nav-menu">
            <div class="btn-user">
                <button id="carrinho">
                    Carrinho
                    <span class="material-symbols-outlined">
                        shopping_cart
                    </span>
                </button>
                <a href="/html/login.html">
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
                <a href="Cursos.html">Cursos</a>
                <a href="CursosGratuitos">Cursos Gratuitos</a>
                <a href="Quem somos">Quem somos</a>
                <a href="Contato">Contato</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="container1">
            <div class="boxone"><!-- perfil do aluno -->
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
                <button type="button" class="botaofoto" style="position: relative;" data-bs-toggle="modal" data-bs-target="#exampleFoto">
                    Alterar
                </button>
                <div class="modal fade" id="exampleFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar</h1>
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
                                            echo "<div class='img'></div>";
                                        }
                                    } else {
                                        echo "<div class='img'></div>";
                                    }
                                    ?>

                                    <form method="post" enctype="multipart/form-data">
                                        <input type="file" name="imagem">
                                        <input type="submit" name="legal" value="Confirmar">
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
                <h2>Nível de plano</h2>
                <label for="gratuito">Gratuito</label>
                <input type="radio" name="gratuito" id="gratuito" value="gratuito">
            </div>
            <div class="conquistas">
                <h2>Conquistas</h2>
                <form action="../php/certificado.php" method="post">
                    <input type="submit" name="certi" value="Emitir Certificado">
                </form>
            </div>
        </div>
        <div class="container2">
            <div class="sobre"><!-- informações que aluno pode adicionar ou mudar no seu perfil -->
                <h2>Sobre mim</h2>
                <form action="update.php" method="post" autocomplete="off">
                    <h4>Informações adicionais</h4>
                    <?php 
                    include('conex.php');
                    $nome = $_SESSION['nome'];
                    $email = $_SESSION['email'];
                    echo "Nome: $nome <br> Email: $email";
                    ?>

                    <?php
                    include('conex.php');
                    $id = $_SESSION['idUsuarios'];
                    $sql = "SELECT * FROM Usuarios where idUsuarios = $id";
                    $resultado = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($resultado) > 0) {
                        while ($linha = mysqli_fetch_assoc($resultado)) {
                            ?>
                            <br>
                            <h6>Informações do Endereço:</h6>
                            <p>CEP:<span><?php echo $linha['cep'];?></span>
                            <p>Logradouro:<span><?php echo $linha['logradouro'];?></span></p>
                            <p>Bairro:<span><?php echo $linha['bairro'];?></span>
                            <p>Cidade:<span><?php echo $linha['cidade'];?></span></p>
                            <p>Complemento<span><?php echo $linha['complemento'];?></span>
                            <p>Número<span><?php echo $linha['numero'];?></span></p>
                            <label for="telefone-celuar">Celular</label>
                            <span><?php echo $linha['telefone'];?></span>
                            <div>
                                <br>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Atualizar
                                </button>
                            </div>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="rodape"></div>
                                            <div class="modal-principal">
                                                <form action="update.php" method="post" autocomplete="off">
                                                    <label for="dt_nascimento">Data de nascimento:*</label>
                                                    <input type="date" name="data" id="data" value="<?php echo $linha['data_nascimento']; ?>" required>
                                                    <br>
                                                    <label for="CPF">CPF:*</label> 
                                                    <input type="text" name="cpf" id="cpf" value="<?php echo $linha['cpf']; ?>" required >  
                                                    <button type="button" onclick="validarCPF()" id="valida">Validar</button>
                                                    <span style="color: black;" id="validar"></span>
                                                    <br>
                                                    <h6>Informações do Endereço:</h6>
                                                    <label for="cep">CEP:</label>
                                                    <input type="text" name="cep" id="cep" value="<?php echo $linha['cep']; ?>" required>
                                                    <button type="button" onclick="consultarCEP()" id="valida">Consultar</button>
                                                    <p>CEP: <input type="text" id="logradouro" value="<?php echo $linha['logradouro']; ?>" name="logradouro"></p>
                                                    <p>Logradouro: <input type="text" id="bairro" value="<?php echo $linha['bairro']; ?>" name="bairro"></p>
                                                    <p>Cidade <input type="text" id="cidade" value="<?php echo $linha['cidade']; ?>" name="cidade"></p>
                                                    <p>UF <input type="text" id="uf" value="<?php echo $linha['uf']; ?>" name="uf"></p>
                                                    <p>Complemento <input type="text" id="complemento" value="<?php echo $linha['complemento']; ?>" name="complemento"></p>
                                                    <p>Número <input type="text" id="numero" value="<?php echo $linha['numero']; ?>" name="numero"></p>
                                                    <label for="telefone-celuar">Telefone(celular)*</label>
                                                    <input type="tel" name="tel-cel" value="<?php echo $linha['telefone']; ?>" id="tel-cel">
                                                    <button type="submit" name="update" class="btn btn-primary">Confirmar</button>
                                                </form>
                                            </div>
                                            <?php
                                        }
                                    } else {
                                        echo 'Nenhum resultado encontrado.';
                                    }
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
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
    <script src="quadro.js"></script>
    <script>
        function acao(){
            let x = document.getElementById("nav-menu");

            if (x.style.display == "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>
    <script src="modal.js"></script>
    <script src="cep.js"></script>
</body>
</html>
