<?php
session_start();
include('conex.php');

// Variáveis para armazenar as mensagens de erro
$erroMensagem = "";
$erroEmail = "";

if (isset($_POST['criar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $pass = $_POST['senha'];

    // Definir senhas de no mínimo 6 caracteres com a necessidade de um número pelo menos.
    if (strlen($pass) < 6 || !preg_match("/[a-zA-Z]/", $pass) || !preg_match("/[0-9]/", $pass)) {
        $erroMensagem = "A senha deve ter no mínimo 6 caracteres e conter letras e números.";
    } else {
        // Verificação do email no nosso banco, caso tenha um email igual, não será aceito.
        $checkQuery = "SELECT idAlunos FROM Alunos WHERE email = '$email'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $erroEmail = "O email está em uso.";
        } else {
            $tipoUsuario = 0;

            $query = "INSERT INTO `db_senac`.`Alunos` (`idAlunos`, `nome`, `email`, `senha`, `tipo_usuario`) VALUES (null, '$nome', '$email', '$pass', '$tipoUsuario')";

            if (mysqli_query($conn, $query)) {
                $_SESSION['idAlunos'] = mysqli_insert_id($conn);
                $_SESSION['nome'] = $nome;
                $_SESSION['email'] = $email;
                $_SESSION['tipoUsuario'] = $tipoUsuario;

                echo "Usuário $nome adicionado com sucesso!<br><br>";
                echo "Bem-vindo(a) $nome";

                if ($tipoUsuario == 0) {
                    header('location: cadastroaluno.php');
                } elseif ($tipoUsuario == 1) {
                    header('location: cadastroaluno.php');
                }
            } else {
                echo "ERRO - O usuário não foi adicionado!" . mysqli_error($conn);
            }
        }
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

                <form action="" class="form" method="post">
                    <div class="erro"><span><?php echo $erroMensagem; ?></span></div>
                    <div class="erro"><span><?php echo $erroEmail; ?></span></div>
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
                <form action="" class="form" method="post">
                    <label for="" class="label-input"><i class='bx bx-envelope  icon'></i>
                        <input type="email" name="email" id="" placeholder="E-mail">
                    </label>
                    <label for="" class="label-input"><i class='bx bx-lock icon'></i>
                        <input type="password" name="senha" id="" placeholder=" Senha">
                    </label>
                    <a href="#" class="password">Esqueci minha senha</a>
                    <input type="submit" name="entrar" value="Entrar" class="btn btn-second" />
                </form>
            </div>
        </div>
    </div>
    <script src="../js/login.js"></script>
</body>

</html>
