<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../css/cadastro.css">
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
       
            <a href="/html/login.html" style="text-decoration: none;"
             id="entrar">Entrar<span class="material-symbols-outlined">
                    person
                    </span>
            </a>
    </header>

    <main>
        <div class="container1">
            <h1>Cadastro de Usuario</h1>
                <form action="insert.php" method="post" autocomplete="off" class="form">
                <h6>Nascimento</h6>
                <label for="dt_nascimento">Data de nascimento:*</label>
                <input type="date" name="data" id="data dados" required>
                <br>
                <h6>Informações sigilosas</h6>
                <label for="CPF">CPF:*</label> 
                <input type="text" name="cpf" id="cpf dados"  required  maxlength="11"  >
                <label for="RG">RG:*</label>
                <input type="text" name="rg" id="rg dado"  required maxlength="7">  
                <button type="button" onclick="validarCPF()" id="valida">Validar</button>
                <span  id="validar"></span>
                <br>
                <h6>Informações do Endereço:</h6>

                    <label for="cep">CEP:</label>
                    <input type="text" name="cep" id="cep"  required>
                    <button type="button" onclick="consultarCEP()" id="valida">Consultar</button>

                    <div class="log"><p>CEP: <span id="logradouro"  name="logradouro"></p>
                        
                    <p>Logradouro: <span id="bairro"  name="bairro"></p>  
                      
                   
                     <p>Bairro: <span id="cidade"  name="cidade"></p> 
                   
                    <p>Cidade: <span id="uf"  name="uf"></p></div>

                <h6>Informações de contato:</h6>

                <label for="tefone-fixo">Telefone(fixo)*</label>
                <input type="tel" id="tel-fix"  name="tel-fix" required>
                <label for="telefone-celuar">Telefone(celular)*</label>
                <input type="tel" name="tel-cel"  id="tel-cel">
                <button type="submit" name="update" class="btn btn-primary" id="enviar">Confirmar</button>
            </form> 
            
                   
        </div>

    </main>
    <footer>

    </footer>
    <script src="menu.js"></script>
    <script src="cep2.js"></script>
</body>
</html>