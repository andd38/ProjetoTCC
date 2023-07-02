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
    
  
   <link rel="stylesheet" href="../css/stylealuno.css">
    <link rel="stylesheet" href="../css/portraitaluno.css" media="screen and (orientation : portrait)">
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  

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

         <div class="container1">
            <div class="boxone"><!-- perfil do aluno -->

<!-- Inserindo imagen -->
<?php
if(isset($_POST['legal']))      {   
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

echo "   <div class='imgdois'>";
echo "</div>";
echo "<style>
.imgdois{
width: 275px;
height: 275px;
background-image: url('$caminhoImagem');
background-size: cover;
background-position:center;
background-repeat : no-repeat;
border-radius:50%;
}

.img {
display:none;
}
</style>";
}

} else {
echo "   <div class='img'>";
echo "</div>";
} 

?>

<form method="post" enctype="multipart/form-data">
   <input type="file" name="imagem">
   <input type="submit" name="legal" value="Enviar">
 </form>
             
            </div>
            <div class="niveldeplano"><!-- informações do curso que o aluno tá fazendo -->
                <h2>Nivel de plano </h2>
               
            <label for="gratuito">Gratuito</label>
            <input type="radio" name="gratuito" id="gratuito" value="gratuito">
            <label for=""></label>
            </div>
            <div class="conquistas">
                <h2>Conquistas</h2>
                <form action="../php/certificado.php" method="post">
                    <input type="submit" name="certi" value="Emitir Certificado">
                </form>
            </div>

         </div>
         <div class="container2">
             <div class="sobre"><!-- informações que aluno pode adicionar ou mudar no seu perfil -->
                    <h2>Sobre mim</h2>




<form action="insert.php" method="post" autocomplete="off">
  <h4>Informações adicionais</h4>

<?php 
include('conex.php');


/* pegar informaçoes do aluno la do banco de dados (nome,senha,email)*/

 $nome =$_SESSION['nome'];
 $email = $_SESSION['email'];

 echo "Nome: $nome <br> Email: $email";


 

?>
<!-- esses dados funcionarão como update na tabela de alunos -->
<br>
<label for="dt_nascimento">Data de nascimento:*</label>
<input type="date" name="data" id="data" required>
<br><label for="CPF">CPF:*</label>
<input type="text" name="cpf" id="cpf" required >
<label for="RG">RG:*</label>
<input type="text" name="rg" id="rg" required >  
<span id="validar"></span>
<button type="button" onclick="validarCPF()" id="valida">Validar</button>
<br>
<h6>Informações do Endereço:</h6>

    <label for="cep">CEP:</label>
    <input type="text" name="cep" id="cep" required>
    <button type="button" onclick="consultarCEP()" id="valida">Consultar</button>

  <p>CEP: <span id="logradouro"></span>
  <p>Logradouro: <span id="bairro"></span></p>
  <p>Bairro: <span id="cidade"></span>
  <p>Cidade: <span id="uf"></span></p>

<label for="tefone-fixo">Telefone(fixo)*</label>
<input type="tel" id="tel-fix" name="tel-fix" required>
<label for="telefone-celuar">Telefone(celular)*</label>
<input type="tel" name="tel-cel" id="tel-cel">



<!-- modal -->

<!-- Button trigger modal -->
<div>
  <button type="submit" class="btn btn-primary" name="insert">Enviar</button>
</form>
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Atualizar
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
 <div class="modal-content">
   <div class="modal-header">
     <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar</h1>
     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
   <div class="rodape"><!-- header -->
                         
                     </div>
                     <div class="modal-principal"><!-- main -->
                         <form action="update.php" method="post" autocomplete="off">
                         <label for="dt_nascimento">Data de nascimento:*</label>
                <input type="date" name="data" id="data" required>
                <br><label for="CPF">CPF:*</label>
                <input type="text" name="cpf" id="cpf" required >
                <label for="RG">RG:*</label>
                <input type="text" name="rg" id="rg" required >  
                <span id="validar"></span>
                <button type="button" onclick="validarCPF()" id="valida">Validar</button>
                <br>
                <h6>Informações do Endereço:</h6>

                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep" required>
                    <button type="button" onclick="consultarCEP()" id="valida">Consultar</button>

                  <p>CEP: <span id="logradouro"></span>
                  <p>Logradouro: <span id="bairro"></span></p>
                  <p>Bairro: <span id="cidade"></span>
                  <p>Cidade: <span id="uf"></span></p>

                <label for="tefone-fixo">Telefone(fixo)*</label>
                <input type="tel" id="tel-fix" name="tel-fix" required>
                <label for="telefone-celuar">Telefone(celular)*</label>
                <input type="tel" name="tel-cel" id="tel-cel">
                         
                         </form>
                     </div>
   </div>
   <div class="modal-footer">
     <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Fechar</button>
     <button type="button" class="btn btn-primary">Atualizar</button>
   </div>
 </div>
</div>
</div>


     






                 
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
    <script src="modal.js"></script>
    <script src="cep.js"></script>

    </body>
</html>