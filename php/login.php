<?php
include_once('conex.php');

if (isset($_GET['status']) && $_GET['status'] === 'logout') {
    echo "<div id='successBox' style='display: none; background-color: #FF6B6B; color: white; padding: 40px; border-radius: 5px; position: fixed; top: 20px; left: 730px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); z-index: 1000;'>
        Sessão finalizada
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
} else {
}

?>

<?php
session_start();
include('conex.php');

if (isset($_POST['criar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pass = $_POST['senha'];

    // Definir senhas de no mínimo 6 caracteres com a necessidade de um número pelo menos.
    if (strlen($pass) < 6 || !preg_match("/[a-zA-Z]/", $pass) || !preg_match("/[0-9]/", $pass)) {
       echo "<span style='color:red;'>A senha deve ter no mínimo 6 caracteres e conter letras e números.</span>";
    } else {
        // Verificação do email no nosso banco, caso tenha um email igual, não será aceito.
        $checkQuery = "SELECT idUsuarios FROM Usuarios WHERE email = '$email'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            echo "<span style='color:red;'>O email está em uso.</span>";
        } else {
            $tipoUsuario = 0;

            // Criptografar a senha usando password_hash()
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

            $query = "INSERT INTO `db_senac`.`Usuarios` (`idUsuarios`, `nome`, `email`, `senha`, `tipo_usuario`, `sobre`) VALUES (null, '$nome', '$email', '$hashedPass', '$tipoUsuario', null)";

            if (mysqli_query($conn, $query)) {
                $_SESSION['idUsuarios'] = mysqli_insert_id($conn);
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $email;
                $_SESSION['tipoUsuario'] = $tipoUsuario;
                $_SESSION['sobre'] = $sobre;

                echo "Usuário $nome adicionado com sucesso!<br><br>";
                echo "Bem-vindo(a) $nome";

                if ($tipoUsuario == 0) {
                    header('Location: cadastroaluno.php?status=success');
                    exit();
                } elseif ($tipoUsuario == 1) {
                    header('Location: cadastroaluno.php');
                    exit();
                }
            } else {
                echo "ERRO - O usuário não foi adicionado!" . mysqli_error($conn);
            }
        }
    }
}


if (isset($_POST['entrar'])) {
    $email = $_POST['email'];
    $pass = $_POST['senha'];

    if ($email == 'admin@gmail.com' && $pass == 'admin') {
        header('Location: adm.php');
        exit();
    }

    $query = "SELECT * FROM Usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($pass, $row['senha'])) {
            $_SESSION['idUsuarios'] = $row['idUsuarios'];
            $_SESSION['nome'] = $row['nome'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['tipoUsuario'] = $row['tipo_usuario'];

            if ($row['tipo_usuario'] == 0) {
                header('Location: aluno.php?status=logado');
                exit();
            } elseif ($row['tipo_usuario'] == 1) {
                header('Location: professor.php');
                exit();
            }
        } else {
            echo "<span style='color:red;'>Credenciais inválidas. Por favor, verifique seu e-mail e senha.</span>";
        }
    } else {
        echo "<span style='color:red;'>Credenciais inválidas. Por favor, verifique seu e-mail e senha.</span>";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Entrar</title>
</head>

<body class="sign-in-js">
    <div class="container">
        <div class="content first-content">
            <!--first content-->
            <div class="first-column">
                <!--first column-->
                <h2 class="title-welcome">Bem-vindo de volta</h2>
                <p class="description description-primary">Para se manter conectado conosco</p>
                <p class="description description-primary">Entre em sua conta</p>
                <button id="signin" class="btn-primary">Entrar</button>
            </div>


            <div class="second-column">
                <!--second column-->
                <h2 class=" title title-second">Crie uma conta usando</h2>
                <div class="social-media">

                    <ul class="list-social-media">
                        <li><a href="#" class="list-item"><i class='bx bxl-facebook-circle'></i></a></li>
                        <li><a href="#" class="list-item"><i class='bx bxl-google-plus-circle'></i></a></li>
                        <li><a href="#" class="list-item"><i class='bx bxl-linkedin-square'></i></a></li>
                    </ul>

                </div>
                <p class="description description-second">Ou use seu E-mail para cadastrar:</p>

                <form  class="form" method="post">
                    <div class="erro"><span></span></div>
                    <div class="erro"><span></span></div>
                    <label for="" class="label-input"><i class='bx bx-user icon'></i>
                        <input type="text" name="nome" id="" placeholder="Nome">
                    </label>
                    <label for="" class="label-input"><i class='bx bx-envelope  icon'></i>
                        <input type="email" name="email" id="" placeholder="E-mail">
                    </label>
                    <label for="" class="label-input"><i class='bx bx-lock icon'></i>
                        <input type="password" name="senha" id="" placeholder="Senha">
                    </label>
                    <input type="submit" name="criar" value="Criar Conta" class="btn btn-primary" />
                </form>
            </div>
        </div>
        <div class="content second-content">
            <!--second content-->
            <div class="first-column">
                <!--first column-->
                <h2 class="title title-welcome">Olá!</h2>
                <p class="description description-primary">Para ter acesso a mais conteúdo</p>
                <p class="description description-primary">Crie sua conta e aproveite!</p>
                <button id="signup" class="btn btn-primary">Cadastrar</button>
            </div>


            <div class="second-column">
                <!--second column-->
                <h2 class="title title-second">Entre usando</h2>
                <div class="social-media">

                    <ul class="list-social-media">
                        <li><a href="#" class="list-item"><i class='bx bxl-facebook-circle'></i></a></li>
                        <li><a href="#" class="list-item"><i class='bx bxl-google-plus-circle'></i></a></li>
                        <li><a href="#" class="list-item"><i class='bx bxl-linkedin-square'></i></a></li>
                    </ul>

                </div>
                <p class="description">Ou use seu E-mail</p>
                <form  class="form" method="post">
                    <label for="" class="label-input"><i class='bx bx-envelope  icon'></i>
                        <input type="email" name="email" id="" placeholder="E-mail">
                    </label>
                    <label for="" class="label-input"><i class='bx bx-lock icon'></i>
                        <input type="password" name="senha" id="" placeholder=" Senha">
                    </label>
                    <input type="submit" name="entrar" value="Entrar" class="btn btn-second" />
                </form>
            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>

</html>
