<?php 
include ('conex.php');




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
  

    <title>Brasil Concursos </title>
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
        <input type="text" id="search" name="pesquisa" placeholder="Buscar curso...">
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
                                <div class="carta">
                                    <br><h1>Concurso PRF</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta">
                                    <br><h1>Concurso PRF</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta">
                                    <br><h1>Concurso PRF</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                            
                            
                            </div>
                            <div class="content medicinal">
                                <div class="carta">
                                    <br><h1>Concurso hran</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta">
                                    <br><h1>Concurso Hospital de Santa Maria</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta">
                                    <br><h1>Concurso Hospital de taguatinga</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                            
                            
                            </div>
                            <div class="content bancario">
                                <div class="carta" >
                                    <br><h1>Concurso banco do brasil</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta" >
                                    <br><h1>Concurso banco centra</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta">
                                    <br><h1>Concurso caixa</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                            
                            </div>
                        </div>
                        <div class="grupo1">
                            <div class="content tech">
                                <div class="carta" >
                                    <br><h1>Concurso agente de tecnologia da caixa</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta" >
                                    <br><h1>Concurso agente de TI do banco central </h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta">
                                    <br><h1>Concurso caixa asssitente de TI </h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                            
                            </div>
                            <div class="content direito">
                                <div class="carta" >
                                    <br><h1>Concurso da PM</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta" >
                                    <br><h1>Concurso TJDFT </h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta">
                                    <br><h1>Concurso TRF </h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                            
                            </div>
                            <div class="content engenharia">
                                <div class="carta" >
                                    <br><h1>Concurso da PM</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta" >
                                    <br><h1>Concurso TJDFT </h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta">
                                    <br><h1>Concurso TRF </h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                            
                            </div>
                        </div>
                        <div class="grupo1">
                            <div class="content militar">
                                <div class="carta" >
                                    <br><h1>Concurso da ITA</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta" >
                                    <br><h1>Concurso eear </h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta">
                                    <br><h1>Concurso esa </h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                            
                            </div>
                            <div class="content vestibular">
                                <div class="carta" >
                                    <br><h1>Enem</h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta" >
                                    <br><h1>PAS </h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                                <div class="carta">
                                    <br><h1>Vestibular tradicional </h1></br>
                                    <br>500 hrs de Aulas</br>
                                    <br>Mais de 20 pdfs de aulas
                                    <br><button>Acessar</button>
                                </div>
                            
                            </div>
                        </div>
                     
                    </div>
                    
                
            
                
            

    </main>
    <footer>

    </footer>
    <script src="/js/pesquisa.js"></script>
</body>
</html>