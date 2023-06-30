<?php 
session_start();

function get_total_all_records(){
include('conex.php');

$stmt = $connection -> prepare("SELECT * FROM alunos");
$stmt -> execute();
$result = $stmt->fetchAll();
return $stmt -> rowCount();

}

if(empty($_SESSION)){
    print("<script>location.href='php/login.php'</script>");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="../css/stylealuno.css">
    <link rel="stylesheet" href="../css/portraitaluno.css" media="screen and (orientation : portrait)">
   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Brasil Concursos </title>
</head>
<body>
    <header>
        <div id="logo">
            <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
        </div>
        <!-- menu-->
       

        <nav>
            <a href="../html/pesquisa.html">Cursos</a>
            <a href="CursosGratuitos">Cursos Gratuitos</a>
            <a href="Quem somos">Quem somos</a>
            <a href="Contato">Contato</a>
        </nav>
        <!--botão pesquisar-->
        <form action="pesquisar.php" method="post">
              <div class="buttonc">
        <input type="text" id="search" placeholder="Buscar curso...">
        <button type="submit"><i class='bx bx-search-alt-2'></i></button>
      </div>
        </form><!--botao do carrinho de compras-->
        
            <a href="#" id="carrinho"> 
                Carrinho
                <span class="material-symbols-outlined">
                    shopping_cart
                    </span>
                </a>
      <!--botao de entrar na área do aluno-->

       <!-- edu onde estiver escrito "entrar" vc vai colocar o nome do aluno  -->
            <a href="../php/logout.php" style="text-decoration: none;"
             id="entrar">Sair<span class="material-symbols-outlined">
                    person
                    </span>
            </a>
      

    </header>
    <header class="mobile">
        <div id="logo">
            <a href="index.html"><img src="img/logo2pequena.png" alt=""></a>
              <!--botão pesquisar-->
        <form action="pesquisar.php" method="post">
            <div class="buttonc">
      <input type="text" id="search" placeholder="Buscar curso...">
      <button type="submit"><i class='bx bx-search-alt-2'></i></button>
    </div>
      </form>
            <i onclick="acao()" id="menu" class='bx bx-menu'></i>
        </div>
        <!-- menu-->
       

      
      
        <!--botao do carrinho de compras-->
       <div class="nav-menu" id="nav-menu">
           <div class="btn-user">
               
                   <button id="carrinho">
                       Carrinho
                       <span class="material-symbols-outlined">
                           shopping_cart
                           </span>
                   </button>
                     <!--botao de entrar na área do aluno-->
               
                   
                     <a href="/html/login.html">  <button id="carrinho" >Entrar</a><span class="material-symbols-outlined">
                           person
                           </span></button></a>
                  
              
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

         <div class="container">
            <div class="boxone"><!-- perfil do aluno -->

            <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  include_once('conex.php');
  $id = $_SESSION['id'];
  $destino = '../img/alunosimg/' . $_FILES['imagem']['name'];

  move_uploaded_file($_FILES['imagem']['tmp_name'], $destino);

  $caminhoImagem = $conn->real_escape_string($destino);
  $sql = "UPDATE alunos SET imagem = '$caminhoImagem' WHERE id = $id";
  $conn->query($sql);

}


include_once('conex.php');
$id = $_SESSION['id'];
$sql = "SELECT imagem FROM alunos WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
  $row = $resultado->fetch_assoc();
  $caminhoImagem = $row['imagem'];

  echo '<img style="border-radius: 50%; max-width: 400px;" src="'. $caminhoImagem . '" alt="Imagem" width="400">';
}


?>
                <!-- Formulário para alterar a imagem -->

<form method="post" enctype="multipart/form-data">
    <input type="file" name="imagem">
    <input type="submit" value="Enviar">
  </form>


                <p> <?php echo $_SESSION['nome'] ?> <br>

                    
                </p>

            </div>
            <div class="boxtwo"><!-- informações do curso que o aluno tá fazendo -->
                <h2>Nivel de plano </h2>

            </div>
            <div class="boxtwo">
                <h2>Conquistas</h2>
                <form action="../php/certificado.php" method="post">
                    <input type="submit" name="certi" value="Emitir Certificado">
                </form>
            </div>

         </div>
         <div class="container2">
             <div class="sobre"><!-- informações que aluno pode adicionar ou mudar no seu perfil -->
                    <h2>sobremim</h2>


                    <!-- modal -->
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <h2>Atualizar dados</h2>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Atualize seus dados </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         
      <div class="modal-content">
                        <div class="rodape"><!-- header -->
                            <h2>Atualizar Dados</h2>
                        </div>
                        <div class="principal"><!-- main -->
                            <form action="update.php" method="post" >
                            <label for="Nome">Nome:</label>
                            <input type="text" name="nome" id="nome">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email">
                            <label for="senha">Senha:</label>
                            <input type="password" name="senha" id="senha">
                            <label for="upgrade">Upgrade:</label>
                            <select name="planos" id="planos">
                                <option value="gratuito">Gratuito</option>
                                <option value="premium">Premium</option>
                                <option value="vitalicio">Vitalicio</option>
                            </select>
                            
                            </form>
                        </div>
                      

                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Atualizar</button>
      </div>
    </div>
  </div>
</div>













                 
             </div>
             <div class="sobre">
                <h2>curso</h2>
             </div>
             <div class="historico">
                <h2>Historico</h2>

                <div class="quadro">

                </div>
             </div>
         </div>
 
    </main>
    <footer>

    </footer>
  
    <script src="quadro.js"></script>
    <script src="menu.js"></script>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>