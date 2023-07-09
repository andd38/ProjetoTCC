<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/cadastro.css">
    <link rel="stylesheet" href="../css/cadastro_alunomobile.css" media="screen and (orientation : portrait)">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100;1,200;1,300;1,400&display=swap');
        *{
            font-family: 'Poppins';
        }
        input[type=text]{
    color: #fff;
    border-radius: 8px;
    outline: none;
    border: 1px solid rgb(113, 160, 158);
    background-color: transparent;
    margin: 5px;
    font-size: 19px;
    padding-left:5px ;

  
  }
  input[type=tel]{
  
    border-radius: 8px;
    outline: none;
    color: #fff;
    margin: 5px;
    border: 1px solid rgb(113, 160, 158);
    background-color: transparent;
    font-size: 19px;
    padding-left:5px ;
  }
  input[type=date]{
  
    border-radius: 5px;
    outline: none;
    border: 1px solid rgb(113, 160, 158);
    background-color: transparent;
    margin: 5px;
    text-align: center;
    color: #fff;
    font-size: 19px;
    padding-left:5px ;
  }
  
    </style>
    <title>Cadastro</title>
</head>

<body>

    <header>
        <div id="logo">
            <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
        </div>
        <!-- menu-->


        <nav>
            <a href="Cursos.html">Cursos</a>
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

        <a href="/html/login.html" style="text-decoration: none;" id="entrar">Entrar<span class="material-symbols-outlined">
                person
            </span>
        </a>
    </header>
    <!--menu versao mobile-->
    <section id="mobile">
        <div id="logo">
            <a href="index.html"><img src="../img/logo2pequena.png" alt=""></a>
              <!--botão pesquisar-->
        <form action="../php/pesquisar.php" method="post">
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
               
                   
                     <a href="html/login.html">  <button id="carrinho" >Entrar</a><span class="material-symbols-outlined">
                           person
                           </span></button></a>
                  
              
              <i onclick="acao()" class='bx bx-x' id="X"></i>

           </div>
           <nav>
               <a href="../html/pesquisa.html">Cursos</a>
               <a href="CursosGratuitos">Cursos Gratuitos</a>
               <a href="Quem somos">Quem somos</a>
               <a href="Contato">Contato</a>
           </nav>
       </div>
</section>      

    <main>
        <div class="container1">
            <h1>Cadastro de Usuario</h1><!-- Formulário -->
            <form action="insert.php" method="post" autocomplete="off" class="form">
                <div class="nascimento">
                    <h3>Nascimento</h3>
                    <label for="dt_nascimento">Data de nascimento:*</label>
                    <input type="date" name="data" id="data" required>
                    <br>
                </div>
                <div class="nascimento">
                    <h3>Informações sigilosas</h3>
                    <label for="CPF">CPF:*</label>
                    <input type="text" name="cpf" id="cpf" required maxlength="11">
                    <label for="RG">RG:*</label>
                    <input type="text" name="rg" id="rg" required maxlength="7">
                    <button type="button" onclick="validarCPF()" id="validaII">Validar</button>
                    <span id="validar"></span>
                    <br>
                    </div>
                <div class="nascimento infocep">
                    <h3>Informações do Endereço:</h3>
                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep" required>
                    <button type="button" onclick="consultarCEP()" id="validaII">Consultar</button>
                    <span id="valida"></span>
                    <div class="log">
                        <p>CEP: <span id="logradouro"></p>
                        <p>Logradouro: <span id="bairro"></p>
                        <p>Bairro: <span id="cidade"></p>
                        <p>Cidade: <span id="uf" ></p>
                    
                        <label for="com">Complemento</label>
                        <input type="text" name="complemento" id="complemento">
                        <label for="num">Numero</label>
                        <input type="text" name="numero" id="numero">
                    
                </div>

                

                <h3>Informações de contato:</h3>

                <label for="tefone-fixo">Telefone(fixo)*</label>
                <input type="tel" id="tel-fix" name="tel-fix" required>
                <label for="telefone-celuar">Telefone(celular)*</label>
                <input type="tel" name="tel-cel" id="tel-cel">
                </div>

              <div class="container2"><!-- Planos da Brasil Consursos -->
                <div></div>
                <div><h1>Gratuito</h1></div>
                <div><h1>Vitalicio</h1></div>
                <div><h1>Premium</h1></div>
                <div>Atividades</div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-x'></i></div>
                <div>Downloads</div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-x'></i></div>
                <div>Certificado</div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-x'></i></div>
                <div>Acesso as aulas pagas</div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-x'></i></div>
                <div>Comentários</div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-x'></i></div>
                <div>1° mes grátis</div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-check'></i></div>
                <div><i class='bx bx-x'></i></div>



              </div>



                <div class=" planos">
                    <label for="">Escolha o seu Curso:</label>
                    <select name="plan" id="plan">

                        <option value="Gratuito">Gratuito</option>
                        <option value="vitalicio">Vitalício</option>
                        <option value="premium">Premium</option>
                    </select>

                </div>
                <button type="submit" name="insert" class="btn btn-primary" id="enviar">Confirmar</button>

            </form>

        </div>



    </main>
    <footer>

    </footer>
    <script >
        function acao(){

let x = document.getElementById("nav-menu") ;


if (x.style.display == "block") {
  x.style.display = "none";
} else {
  x.style.display = "block";
}

}

    </script>
    <script src="cep2.js"></script>
</body>

</html>