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
  main {
        display: flex;
        justify-content: space-around;
        align-items: center;
        height: 60vh;
    }

    main div {
        background-color: transparent;
        border: 1px solid aquamarine;
        border-radius: 5px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    main div span {
        font-size: 24px;
        display: block;
        margin-bottom: 10px;
        color: white;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: aquamarine;
        color: black;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: transparent;
        border: 1px solid aquamarine;
        color: white;
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
        <h1 style="color:white;">Gerenciamento de Usuários</h1>
        </nav>
        <!--botao de entrar na área do aluno-->

        <a href="../php/logout.php" style="text-decoration: none;" id="entrar">Sair<span class="material-symbols-outlined">
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


                <a href="html/login.html"> <button id="carrinho">Entrar</a><span class="material-symbols-outlined">
                    person
                </span></button></a>


                <i onclick="acao()" class='bx bx-x' id="X"></i>

            </div>
            <nav>
            <h1></h1>
            </nav>
        </div>
    </header>
        

    <main>
    <div>
        <span>Alunos</span>
        <a href="alunossearch.php" class="btn">Ver Alunos</a>
    </div>
    <div>
        <span>Professores</span>
        <a href="professorsearch.php" class="btn">Ver Professores</a>
    </div>
    <div>
        <span>Cursos</span>
        <a href="cursosearch.php" class="btn">Ver Cursos</a>
    </div>
    <div>
        <span>Matriculas</span>
        <a href="matriculasearch.php" class="btn">Ver Matriculas</a>
    </div>
</main>






</body>
</html>