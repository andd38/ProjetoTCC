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
        <h1 style="color:white; text-align:center; margin-top:10px;">Professores</h1>
            <form action="" method="post">
                <div style="margin-top: 10px; " class="buttonc">
                    <input name="pesquisa" type="text" id="pesquisa" placeholder="Buscar...">
                    <button type="submit"><i class='bx bx-search-alt-2'></i></button>
                </div>
            </form>
            <div class="overflow">
                <table>
                    <tr>
                <th>idUsuario</th>
                <th>Nome</th>
                <th>Senha</th>
                <th>Cpf</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Nascimento</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Complemento</th>
                <th>Número</th>
                <th>Logradouro</th>
                <th>Uf</th>
                <th>Cep</th>
                <th>Plano</th>
                <th>tipo_usuario</th>
                <th>Atualizar</th>
                <th>Apagar</th>
                    </tr>
                 <?php
                 include_once('conex.php');
              if(isset($_POST['pesquisa'])){
             
                $pesquisa = $_POST['pesquisa'];
                $sql = "SELECT * FROM Usuarios 
                        WHERE (nome LIKE '%$pesquisa%' 
                        OR email LIKE '%$pesquisa%' 
                        OR cidade LIKE '%$pesquisa%'
                        OR idUsuarios LIKE '%$pesquisa%')
                        AND tipo_usuario = 1;";
            } else {
                // If search form is not submitted, display all users
                $sql = "SELECT * FROM Usuarios WHERE tipo_usuario = 1;";
            }
                 
                $resultado = $conn->query($sql);
                
                while ($row = $resultado->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['idUsuarios'] . '</td>';
                echo '<td>' . $row['nome'] . '</td>';
                echo '<td>' . $row['senha'] . '</td>';
                echo '<td>' . $row['cpf'] . '</td>';
                echo '<td>' . $row['telefone'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['data_nascimento'] . '</td>';
                echo '<td>' . $row['cidade'] . '</td>';
                echo '<td>' . $row['bairro'] . '</td>';
                echo '<td>' . $row['complemento'] . '</td>';
                echo '<td>' . $row['numero'] . '</td>';
                echo '<td>' . $row['logradouro'] . '</td>';
                echo '<td>' . $row['uf'] . '</td>';
                echo '<td>' . $row['cep'] . '</td>';
                echo '<td>' . $row['plano'] . '</td>';
                echo '<td>' . $row['tipo_usuario'] . '</td>';
                echo '<td><a href="updatemod.php?id='.$row['idUsuarios'].'"><svg style="color:aquamarine;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
              </svg><a></td>';
                echo '<td> <a href="delete.php?id='.$row['idUsuarios'].'"><svg style="color:red;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
              </svg></a></td>';
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