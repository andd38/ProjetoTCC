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
    echo "<script>location.href='php/login.php'</script>";
}
$nome = $_SESSION['nome'];
$id = $_SESSION['idUsuarios'];

include_once('conex.php');

$id = $_SESSION['idUsuarios'];

$query = "SELECT tipo_usuario FROM Usuarios Where idUsuarios = '$id';";

$resultado = $conn->query($query);
$row = $resultado->fetch_assoc();
if ($row['tipo_usuario'] != 1) {
    header('Location: aluno.php');
    exit();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Bem vindo o professor</title>
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



        .bx {
            width: 25px;
            font-size: 20px;
        }

        main {
            display: flex;
            justify-content: center;

        }

        .container1 {

            height: 1000px;
            margin: 5px;
        }

        .container2 {

            height: 1000px;
            margin: 5px;
        }

        .box1 {
            width: 450px;
            height: 450px;
            background-color: #0b090951;
            border-radius: 15px;
            margin: 25px 25px;
            color: #fff;
        }

        .box2 {
            width: 650px;
            height: 925px;
            background-color: #0b090951;
            border-radius: 15px;
            margin: 25px 25px;
        }

        .description {
            display: flex;
            margin: 50px 5px 25px 5px;
            align-items: center;
            justify-content: center;
            color: #fff;
            flex-direction: column;
            gap: 15px;
        }

        .description p {
            font-size: 21px;
            margin-left: 8px;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .enviaulas {
            display: flex;
            gap: 15px;
        }

        textarea {
            margin-top: 25px;
            border: 2px solid rgb(116, 211, 179);
            outline: none;
            resize: none;
            width: 80%;
            color: white;
            background-color: transparent;
        }

        #aula {
            padding: 10px;
            outline: none;
            width: 80%;
            height: 40px;
        }

        #cursocontent {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-left: 10%;
            overflow-y: auto;
            max-height: 240px;

        }

        #cursocontent>a {
            background-color: aquamarine;
            color: #000000;
            border-radius: 5px;
            padding: 5px;
            width: 150px;
            transition: 0.5s;
            text-decoration: none;
            cursor: pointer;
            text-align: center;
            overflow: hidden;
        }

        #cursocontent>a:hover {

            background-color: transparent;
            color: #fff;
        }

        .en {
            display: flex;
            justify-content: center;
            margin-top: 150px;
        }

        .send-course {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            background-color: aquamarine;
            color: #000000;
            border-radius: 5px;
            padding: 10px;
            width: 150px;
            transition: 0.5s;
        }

        .send-course:hover {
            border: aquamarine 1px solid;
            background-color: transparent;
            color: #fff;
        }

        .circulo {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

        }

        .circulo img {

            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .circulo img:hover {
            border: 3px solid aquamarine;
            padding: 3px;
        }

        .imagemfile {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-left: 25px;
        }

        .custom-file-input {
            position: relative;
            display: inline-block;
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

        input[type="submit"] {
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

         #valida{
  width: 110px;
  height: 25px;
  outline: none;
  border: none;
  border-radius: 5px;
  color: #000000;
  background-color: rgb(130, 214, 186);
 }
 #valida:hover{
  background-color: #fff;
  color: rgb(123, 200, 174);
  transition: 0.5s;
 }
input[type=text]{

  border-radius: 8px;
  outline: none;
  border: aqua solid 1px;
  margin: 5px;
  width: 200px;
  background-color: transparent;
  color: white;

}
input[type=text]:focus,input[type=tel]:focus,input[type=date]:focus{
    background-color: transparent;
    color: white;
}

input[type=tel]{

  border-radius: 8px;
  outline: none;
  border: none;
  margin: 5px;
  width: 200px;
  background-color: transparent;
  color: white;
  border: aqua solid 1px;
}
input[type=date]{
    width: 200px;
  border-radius: 5px;
  outline: none;
  border: none;
  margin: 5px;
  text-align: center;
  background-color: transparent;
  color: white;
  border: aqua solid 1px;
}
.modal-principal{
 color: #000000;
}

span {
  color: #fdfdfd;
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



        input[type="submit"]:hover {
            border: aquamarine 1px solid;
            background-color: transparent;
            color: #fff;
        }


        .custom-file-input input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .custom-file-input label {
            display: block;
            pointer-events: none;
        }

        .custom-file-input:hover {
            border: aquamarine 1px solid;
            background-color: transparent;
            color: #fff;
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

        .dados {
            margin-top: 25px;
            margin-left: 130px;
        }

        @media screen and (max-width : 1040px) {
            main {
                display: flex;
                flex-direction: column-reverse;
                max-width: 150vh;
                justify-content: center;
                align-items: center;
            }

            .description {
                display: flex;
                flex-direction: column;
                
                
            }

            .box2 {
                display: flex;
                flex-direction: column;
                max-width: 435px;

            }

            img {
                width: 150px;
            }


        }
    </style>
</head>

<body>
    <header>

        <nav>

            <a href="enviaraulas.php"><img style="width: 150px; margin-top:-50px" src="../img/logo2pequena.png" alt=""></a>
            <h2>Bem vindo professor</h2>
            <a href="../php/logout.php" style="text-decoration: none;" id="entrar"><i class='bx bxs-user' style="margin-right: 50px;">Sair</i>
            </a>
        </nav>
    </header>
    <main>

        <div class="container1">
            <div class="box1">
                <h2>Cursos</h2>
                <div id="cursocontent">

                    <?php
                    include_once('conex.php');
                    $sql = "SELECT idCursos, nome FROM Cursos WHERE Usuarios_idUsuarios = '$id';";
                    $resultado = $conn->query($sql);

                    if ($resultado && $resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            $idCurso = $row['idCursos'];
                            $curso = $row['nome'];
                            echo "<a href='videoedit.php?id=$idCurso'>$curso</a><br>";
                        }
                    }
                    ?>



                    <!-- link para adicionar curso , coloquei aqui aleatoriamente ,temos que achar um lugar para ele -->
                </div>
                <div class="en"><a href="../php/cadastrarcurso.php" style="width: 200px;" class="send-course">Cadastrar curso</a></div>
            </div>
            <div class="box1">
                
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

        </div>
        <div class="container2">
            <div class="box2">
                <h2>Perfil</h2>
                <div class="description">
                    <!-- O professor poderá inserir informações no seu perfil (php)  -->
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
                            echo "<div class='circulo'><img src='$caminhoImagem' alt='user' ></div>";
                        } else {
                            echo "<div class='circulo'><img src='../img/thumb/149071.png' alt='user'></div>";
                        }
                    } else {
                        echo "<div class='circulo'><img src='../img/thumb/149071.png' alt='user'></div>";
                    }
                    ?>

                    <button type="button" class="btn btn-secondary" style="position: relative;" data-bs-toggle="modal" data-bs-target="#exampleFoto">
                        Alterar
                    </button>
                    <div class="modal fade" id="exampleFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content" style="background-color:#00000051;">
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
                                                echo "<div class='circulo'><img src='$caminhoImagem' alt='user'></div>";
                                            } else {
                                                echo "<div class='circulo'><img style='display:flex; justify-content:center;' src='../img/thumb/149071.png' alt='user' ></div>";
                                            }
                                        } else {
                                            echo "<div class='circulo'><img style='display:flex; justify-content:center;'  src='../img/thumb/149071.png' alt='user'></div>";
                                        }
                                        ?>

                                        <form class="imagemfile" method="post" enctype="multipart/form-data">
                                            <div class="custom-file-input">
                                                <input type="file" id="fileInput" name="imagem">
                                                <label for="imagem">Escolher arquivo</label>
                                            </div>
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
                        <div class="modal fade" id="meumodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.2);">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Atualizar Dados</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <form action="update.php" method="post" autocomplete="off">
                                            <label for="name">Nome</label>
                                            <input type="text" name="nome" id="nome" class="form-control" value="<?php echo $linha['nome']; ?>" required>

                                            <label for="dt_nascimento">Data de nascimento:</label>
                                            <input type="date" name="data" id="data" class="form-control" value="<?php echo $linha['data_nascimento']; ?>" required>

                                            <label for="CPF">CPF:</label>
                                            <input type="text" name="cpf" id="cpf" class="form-control" value="<?php echo $linha['cpf']; ?>" required>
                                            <button type="button" onclick="validarCPF()" id="valida">Validar</button>
                                            <span style="color: black;" id="validar"></span>

                                            <h6>Informações do Endereço:</h6>
                                            <label for="cep">CEP:</label>
                                            <input type="text" name="cep" id="cep" class="form-control" value="<?php echo $linha['cep']; ?>" required>
                                            <button type="button" onclick="consultarCEP()" id="valida">Consultar</button>

                                            <div style="display: flex;">
                                                <p>CEP: <input type="text" id="logradouro" class="form-control" value="<?php echo $linha['logradouro']; ?>" name="logradouro"></p>
                                                <p>Logradouro: <input type="text" id="bairro" class="form-control" value="<?php echo $linha['bairro']; ?>" name="bairro"></p>
                                            </div>

                                            <div style="display: flex;">
                                                <p>Cidade <input type="text" id="cidade" class="form-control" value="<?php echo $linha['cidade']; ?>" name="cidade"></p>
                                                <p>UF <input type="text" id="uf" class="form-control" value="<?php echo $linha['uf']; ?>" name="uf"></p>
                                            </div>

                                            <p>Complemento <input type="text" id="complemento" class="form-control" value="<?php echo $linha['complemento']; ?>" name="complemento"></p>
                                            <p>Número <input type="text" id="numero" class="form-control" value="<?php echo $linha['numero']; ?>" name="numero"></p>

                                            <label for="telefone-celuar">Telefone (celular)</label>
                                            <input type="tel" name="tel-cel" class="form-control" value="<?php echo $linha['telefone']; ?>" id="tel-cel">
                                        </form>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="update" class="btn btn-secondary">Confirmar</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }

                ?>
                </div>


            </div>

        </div>
    </main>
    <footer>

    </footer>
</body>

</html>