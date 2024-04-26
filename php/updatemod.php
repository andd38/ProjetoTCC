<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleall.css" media="all">
    <link rel="stylesheet" href="../css/portrait.css" media="screen and (orientation : portrait)">

    <script src="js/slide.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <title>Brasil Concursos </title>
    <style>




        form {
        border-radius: 5px;
        padding: 20px;
        background-color:rgba(0, 0, 0, 0.397);
        width: 60%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        margin: auto;
        height: 100%;
    }

    label {
        font-weight: bold;
        margin-top: 10px;
        color: white;
    }

    input[type="text"],
    input[type="date"],
    input[type="email"],
    input[type="tel"] {
        width: 200px;
        padding: 10px;
        margin: 5px 0;
        border: 1px solid aquamarine;
        background-color: transparent;
        color: white;
        border-radius: 5px;
        outline: none;
    }

    button {
        display: inline-block;
        padding: 10px 20px;
        background-color: aquamarine;
        color: black;
        text-decoration: none;
        width: 150px;
        border: none;
        margin-left: 10px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        border: 1px solid aquamarine;
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
            <a href="../ProjetoTCC/html/pesquisa.html">Cursos</a>
            <a href="CursosGratuitos">Editais</a>
            <a href="Quem somos">Sobre</a>
            <a href="Contato">Contato</a>
        </nav>
        <!--botao de entrar na área do aluno-->

        <a href="../php/adm.php" style="text-decoration: none;" id="entrar">Voltar<span class="material-symbols-outlined">
                person
            </span>
        </a>

    </header>
    <!--menu versao mobile-->
    <header class="mobile">
        <div id="logo">
            <a href="index.html"><img src="img/logo2pequena.png" alt=""></a>
            <i onclick="acao()" id="menu" class='bx bx-menu'></i>
        </div>
        <!-- menu-->




        <div class="nav-menu" id="nav-menu">
            <div class="btn-user">
                <!--botao de entrar na área do aluno-->


                <a href="../php/alunossearch.php"> <button id="carrinho">Voltar</a><span class="material-symbols-outlined">
                    person
                </span></button></a>


                <i onclick="acao()" class='bx bx-x' id="X"></i>

            </div>
            <nav>
            </nav>
        </div>
    </header>
    <?php
    include('conex.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM Usuarios where idUsuarios = $id";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
    ?>
<form action="update.php?id=<?php echo $id; ?>" method="post" autocomplete="off" style="display: flex; flex-direction: column; align-items: center;">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?php echo $linha['nome']; ?>" style="border: 1px solid aquamarine; background-color: transparent; color: white;" required>

    <label for="data">Data de nascimento:</label>
    <input type="date" name="data" id="data" value="<?php echo $linha['data_nascimento']; ?>" style="border: 1px solid aquamarine; background-color: transparent; color: white;" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?php echo $linha['email']; ?>" style="border: 1px solid aquamarine; background-color: transparent; color: white;" required>      

    <label for="cpf">CPF:</label>
    <div style="margin-left:165px;">
        <input type="text" name="cpf" id="cpf" value="<?php echo $linha['cpf']; ?>" style="border: 1px solid aquamarine; background-color: transparent; color: white; flex: 1;" required>
        <button type="button" onclick="validarCPF()" id="valida">Validar</button>
        <span style="color: black;" id="validar"></span>
    </div>

    <h6 style="color:white">Informações do Endereço:</h6>

    <label for="cep">CEP:</label>
    <div style="margin-left:164px;">
        <input type="text" name="cep" id="cep" value="<?php echo $linha['cep']; ?>" style="border: 1px solid aquamarine; background-color: transparent; color: white; flex: 1;" required>
        <button type="button" onclick="consultarCEP()" id="valida">Consultar</button>
    </div>
            <label for="logradouro">Logradouro:</label>
            <input type="text" id="logradouro" value="<?php echo $linha['logradouro']; ?>" name="logradouro" style="border: 1px solid aquamarine; background-color: transparent; color: white;" required>
    </div>

    
     
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" value="<?php echo $linha['cidade']; ?>" name="cidade" style="border: 1px solid aquamarine; background-color: transparent; color: white;" required>
            
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" value="<?php echo $linha['bairro']; ?>" name="bairro" style="border: 1px solid aquamarine; background-color: transparent; color: white;" required>
        
   
            <label for="uf">UF:</label>
            <input type="text" id="uf" value="<?php echo $linha['uf']; ?>" name="uf" style="border: 1px solid aquamarine; background-color: transparent; color: white;" required>
        
 

    <label for="complemento">Complemento:</label>
    <input type="text" id="complemento" value="<?php echo $linha['complemento']; ?>" name="complemento" style="border: 1px solid aquamarine; background-color: transparent; color: white;">

    <label for="numero">Número:</label>
    <input type="text" id="numero" value="<?php echo $linha['numero']; ?>" name="numero" style="border: 1px solid aquamarine; background-color: transparent; color: white;">

    <label for="tel-cel">Telefone (celular):</label>
    <input type="tel" name="tel-cel" id="tel-cel" value="<?php echo $linha['telefone']; ?>" style="border: 1px solid aquamarine; background-color: transparent; color: white;">

    <label for="tipo">Tipo de Usuario (0=Aluno,1=Professor):</label>
    <input type="text" name="tipo" id="tipo" value="<?php echo $linha['tipo_usuario']; ?>" style="border: 1px solid aquamarine; background-color: transparent; color: white;">
    <button type="submit" name="updatemod" class="btn btn-secondary">Confirmar</button>
</form>

    <?php
        }
    }
    ?>
</body>

</html>