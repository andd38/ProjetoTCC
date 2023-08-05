<?php
include('conex.php');

if (isset($_POST['updatecurso'])) {
    $id = $_GET['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];

    $sql = "UPDATE Cursos SET nome='$nome', descrição='$descricao', Categoria='$categoria' WHERE idCursos=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Curso atualizado com sucesso!";
        header('location:cursosearch.php');
    } else {
        echo "Erro ao atualizar curso: " . mysqli_error($conn);
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
        height: 50vh;
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

        <a href="../php/cursosearch.php" style="text-decoration: none;" id="entrar">Voltar<span class="material-symbols-outlined">
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
$sql = "SELECT * FROM Cursos WHERE idCursos = $id";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
?>
<form method="post" autocomplete="off" style="display: flex; flex-direction: column; align-items: center;">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?php echo $linha['nome']; ?>" style="border: 1px solid aquamarine; background-color: transparent; color: white;" required>

    <label for="descricao">Descrição:</label>
    <input type="text" name="descricao" id="descricao" value="<?php echo $linha['descrição']; ?>" style="border: 1px solid aquamarine; background-color: transparent; color: white;" required>

    <label for="categoria">Categoria:</label>
    <input type="text" name="categoria" id="categoria" value="<?php echo $linha['Categoria']; ?>" style="border: 1px solid aquamarine; background-color: transparent; color: white;" required>

    <button type="submit" name="updatecurso" class="btn btn-secondary">Confirmar</button>
</form>
<?php
    }
}
?>

</body>

</html>