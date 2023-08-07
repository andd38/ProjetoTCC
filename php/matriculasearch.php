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
        table {
            border-collapse: collapse;
            margin: auto;
            width: 90%;
         height: 10vh;
         margin-top: 20px;
        }
        th, td {
            border: 1px solid aquamarine;
            padding: 8px;
            text-align: center;
            color: white;
            font-size: small;
            
        }
        th {
            color: black;
            background-color: aquamarine;
        }
        main {
            margin: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid black;
            width: 95%;
            height: 100vh;
            background-color:rgba(0, 0, 0, 0.397);
            border-radius: 15px;
           
        }
        .overflow {

            overflow-x: auto;
            overflow-y: auto;
            max-height: 99%;
            max-width: 99%;
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
 
        </nav>
        <!--botao de entrar na área do aluno-->

        <a href="html/login.html" style="text-decoration: none;" id="entrar">Entrar<span class="material-symbols-outlined">
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


                <a href="../php/adm.php" style="text-decoration: none;" id="entrar">Voltar<span class="material-symbols-outlined">
                person
            </span>
        </a>


                <i onclick="acao()" class='bx bx-x' id="X"></i>

            </div>
            <nav>

            </nav>
        </div>
    </header>
        <main>
        <h1 style="color:white; text-align:center; margin-top:10px;">Cursos</h1>
            <form action="" method="post">
                <div style="margin-top: 10px; " class="buttonc">
                    <input name="pesquisa" type="text" id="pesquisa" placeholder="Buscar...">
                    <button type="submit"><i class='bx bx-search-alt-2'></i></button>
                </div>
            </form>
        <div class="overflow">
            <table>
                <tr>
                    <th>iD da Matricula</th>
                    <th>iD do Usuario</th>
                    <th>ID do Curso</th>
          
                </tr>
                <?php
                include_once('conex.php');
                if(isset($_POST['pesquisa'])){
                    $pesquisa = $_POST['pesquisa'];
                    $sql = "SELECT * FROM Matricula
                            WHERE Usuarios_idUsuarios LIKE '%$pesquisa%' 
                            OR Cursos_idCursos LIKE '%$pesquisa%';";
                    } else {
                    $sql = "SELECT * FROM Matricula";
                    }
                    $resultado = $conn->query($sql);

                    while ($row = $resultado->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['idMatricula'] . '</td>';
                        echo '<td>' . $row['Usuarios_idUsuarios'] . '</td>';
                        echo '<td>' . $row['Cursos_idCursos'] . '</td>';
                        echo '</tr>';

                            }
                        ?>
            </table>
                </div>

            
        </main>
    <footer>

    </footer>
</body>

</html>