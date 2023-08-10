<?php 
include ('conex.php');
session_start();
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
    <link rel="stylesheet" href="../css/pesquisa.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  
    <style>
     a {
        text-decoration: none;
     }
    </style>
    <title>Brasil Concursos </title>
</head>
<body>
    <header>
        <div id="logo">
            <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
        </div>
        <!-- menu-->
       

        <nav>
            <a href="../php/aluno.php">Aluno</a>
            <a href="../html/sobre.html">Quem somos</a>
            <a href="Contato">Contato</a><!-- api do whatsapp -->
        </nav>
        <!--botão pesquisar-->
        <form action="pesquisar.php" method="post">
        </form>
    
      <!--botao de entrar na área do aluno-->
       
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
            <!--botão pesquisar-->
           
            <i onclick="acao()" id="menu" class='bx bx-menu'></i>
        </div>
        <!-- menu-->




        <!--botao do carrinho de compras-->
        <div class="nav-menu" id="nav-menu">
            <div class="btn-user">

                
                <!--botao de entrar na área do aluno-->


                <a href="html/login.html"> <button id="carrinho">Entrar</a><span class="material-symbols-outlined">
                    person
                </span></button></a>


                <i onclick="acao()" class='bx bx-x' id="X"></i>

            </div>
            <nav>
                <a href="../php/pesquisa.php">Cursos</a>
               
                <a href="../html/sobre.html">Sobre</a>
                <a href="Contato">Contato</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="areas">

            <nav>
                <a href="#" id="iconeum"><abbr title="Carreira Bancarios"><i class='bx bxs-bank icons' ></abbr></i></a>
                <a href="#"id="iconedois"><abbr title="Carreira medicina"><i class='bx bx-plus-medical icons' ></abbr></i></a>
                <a href="#" id="iconetres"><abbr title=" Carreira tecnologia"><i class='bx bx-sitemap icons' ></abbr></i></a>
                <a href="#"  id="iconequatro"><abbr title="Carreira administração"><i class='bx bxs-bar-chart-alt-2 icons'></abbr></i></a>
                <a href="#" id="iconecinco"><abbr title="Carreira direito">
                    <span id= 'icons' class="material-symbols-outlined " >
                        balance
                        </span>
                </abbr></i></a>
                <a href="#" id="iconeseis"><abbr title=" Carreira engenharia"><i class='bx bx-building-house icons' ></abbr></i></a>
                <a href="#" id = "iconesete"><abbr title=" Carreira militar">
                    <span id = "icons" class="material-symbols-outlined " >
                        military_tech
                        </span>
                </abbr></a>
                <a href="#" id="iconeoito"><abbr title="Carreira vestibular"><i class='bx bx-book icons' ></abbr></i></a>
            </nav>

            
               
                    <div class="concurso">
                        <div class="grupo1">
                            <div class="content adm">
                            <?php

include_once('conex.php');

$sql = "SELECT * FROM Cursos WHERE Categoria = 'adm';";
$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
    $idCurso = $row['idCursos']; 
    $nome = $row['nome'];
    $descricao = $row['descrição'];
    echo '<form action="video.php?id='.$idCurso.'" method="post">';
    echo '<div class="carta">';
    echo '<br><h1>' . $nome . '</h1></br>';
    echo '<br>'.$descricao.'</br>';
    echo '<br><a href="video.php?id=' . $idCurso . '"><button>Acessar</button></a></br>';
    echo '</div>';
    echo '</form>';
}
?>


                            </div>


                            <div class="content medicinal">
                            <?php

include_once('conex.php');

$sql = "SELECT * FROM Cursos WHERE Categoria = 'medicinal';";
$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
        $row = $resultado->fetch_assoc();
        $idCurso = $row['idCursos']; 
        $nome = $row['nome'];
        $descricao = $row['descrição'];
        echo '<form action="video.php?id='.$idCurso.'" method="post">';
        echo '<div class="carta">';
        echo '<br><h1>' . $nome . '</h1></br>';
        echo '<br>'.$descricao.'</br>';
        echo '<br><a href="video.php?id=' . $idCurso . '"><button name="userinsert">Acessar</button></a></br>';
        echo '</div>';
        echo '</form>';
    
}
?>
                            
                            </div>
                            <div class="content bancario">
                            <?php

include_once('conex.php');

$sql = "SELECT * FROM Cursos WHERE Categoria = 'bancario';";
$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
        $idCurso = $row['idCursos']; 
        $nome = $row['nome'];
        $descricao = $row['descrição'];
        echo '<form action="video.php?id='.$idCurso.'" method="post">';
        echo '<div class="carta">';
        echo '<br><h1>' . $nome . '</h1></br>';
        echo '<br>'.$descricao.'</br>';
        echo '<br><a href="video.php?id=' . $idCurso . '"><button name="userinsert">Acessar</button></a></br>';
        echo '</div>';
        echo '</form>';
    
}
?>
                        </div>
                        <div class="grupo1">
                            <div class="content tech">
                            <?php

include_once('conex.php');

$sql = "SELECT * FROM Cursos WHERE Categoria = 'tecnologia';";
$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
        $idCurso = $row['idCursos']; 
        $nome = $row['nome'];
        $descricao = $row['descrição'];
        echo '<form action="video.php?id='.$idCurso.'" method="post">';
        echo '<div class="carta">';
        echo '<br><h1>' . $nome . '</h1></br>';
        echo '<br>'.$descricao.'</br>';
        echo '<br><a href="video.php?id=' . $idCurso . '"><button name="userinsert">Acessar</button></a></br>';
        echo '</div>';
        echo '</form>';
    
}
?>
                            
                            </div>
                            <div class="content direito">
                            <?php

include_once('conex.php');

$sql = "SELECT * FROM Cursos WHERE Categoria = 'direito';";
$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
        $idCurso = $row['idCursos']; 
        $nome = $row['nome'];
        $descricao = $row['descrição'];
        echo '<form action="video.php?id='.$idCurso.'" method="post">';
        echo '<div class="carta">';
        echo '<br><h1>' . $nome . '</h1></br>';
        echo '<br>'.$descricao.'</br>';
        echo '<br><a href="video.php?id=' . $idCurso . '"><button name="userinsert">Acessar</button></a></br>';
        echo '</div>';
        echo '</form>';
    
}
?>
                            
                            </div>
                            <div class="content engenharia">
                            <?php

include_once('conex.php');

$sql = "SELECT * FROM Cursos WHERE Categoria = 'engenharia';";
$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
        $idCurso = $row['idCursos']; 
        $nome = $row['nome'];
        $descricao = $row['descrição'];
        echo '<form action="video.php?id='.$idCurso.'" method="post">';
        echo '<div class="carta">';
        echo '<br><h1>' . $nome . '</h1></br>';
        echo '<br>'.$descricao.'</br>';
        echo '<br><a href="video.php?id=' . $idCurso . '"><button name="userinsert">Acessar</button></a></br>';
        echo '</div>';
        echo '</form>';
    
}
?>
                            
                            </div>
                        </div>
                        <div class="grupo1">
                            <div class="content militar">
                            <?php

include_once('conex.php');

$sql = "SELECT * FROM Cursos WHERE Categoria = 'militar';";
$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
        $idCurso = $row['idCursos']; 
        $nome = $row['nome'];
        $descricao = $row['descrição'];
        echo '<form action="video.php?id='.$idCurso.'" method="post">';
        echo '<div class="carta">';
        echo '<br><h1>' . $nome . '</h1></br>';
        echo '<br>'.$descricao.'</br>';
        echo '<br><a href="video.php?id=' . $idCurso . '"><button name="userinsert">Acessar</button></a></br>';
        echo '</div>';
        echo '</form>';
    
}
?>
                            
                            </div>
                            <div class="content vestibular">
                            <?php

include_once('conex.php');

$sql = "SELECT * FROM Cursos WHERE Categoria = 'vestibular';";
$resultado = $conn->query($sql);

while ($row = $resultado->fetch_assoc()) {
        $idCurso = $row['idCursos']; 
        $nome = $row['nome'];
        $descricao = $row['descrição'];
        echo '<form action="video.php?id='.$idCurso.'" method="post">';
        echo '<div class="carta">';
        echo '<br><h1>' . $nome . '</h1></br>';
        echo '<br>'.$descricao.'</br>';
        echo '<br><a href="video.php?id=' . $idCurso . '"><button name="userinsert">Acessar</button></a></br>';
        echo '</div>';
        echo '</form>';
    
}
?>
                            
                            </div>
                        </div>
                     
                    </div>
    </main>
    <footer>

    </footer>
    <script src="../js/pesquisa.js"></script>
    <script src="menu.js"></script>
</body>
</html>