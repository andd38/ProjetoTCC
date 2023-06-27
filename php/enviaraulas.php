<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Bem vindo o professor</title>
    <style>
        @charset "utf-8";
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
       

        body{
    background: rgb(83,121,121);
    background: linear-gradient(17deg, rgba(83,121,121,1) 22%, rgba(21,70,70,1) 83%);
    background-attachment: fixed;
    background-size: cover;
    background-repeat: no-repeat;
        }
        *{
    margin: 0px;
    padding: 0px;
    font-family: 'Poppins';
}
 img {
 height: 120px;
 padding: 0;
 margin-top:-40px;
} 

 
 header{
    margin-top: 10px;
 
 }
 nav{
    display: flex;
    justify-content: space-around;
 }
 nav>a{
    color: #fff;
    text-decoration: none;
    margin: 15px;
    font-size: 21px;
    transition: .3s;
 }
h2{
    color: rgb(83,121,121);
    text-align: center;
}

#entrar{
    border-radius: 25px;
    display: flex;
    align-items: center;
    justify-content: space-around;
    height: 45px;
    width: 140px;
    border: none;
    background-color: #fff;
    color: #000000;
}
#entrar:hover{
    background-color: rgb(56, 214, 161);
    outline: none;
    border: none;
    transition: 0.5s;
}


  
  .bx  {
      width: 25px;
      font-size: 20px;
  }
main{
    display: flex;
    justify-content: center;

}
.container1{
    
    height: 1000px;
    margin: 5px;
}
.container2{
  
    height: 1000px;
    margin: 5px;
}
.box1{
    width: 450px;
    height: 450px;
    background-color: #fff;
    border-radius: 15px;
    margin: 25px 25px;
}
.box2{
    width: 650px;
    height: 925px;
    background-color: #fff;
    border-radius: 15px;
    margin: 25px 25px;
}
.description{
    display: flex;
    margin: 25px 5px 25px 5px;
    align-items: center;
    justify-content: center;
}
.description p{
    font-size: 21px;
    margin-left: 8px;
}
form{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
form >  button,input[type=file]{
    width: 150px;
    height: 50px;
    background-color: rgb(83,121,121);
}

    </style>
</head>
<body>
    <header>

        <nav>
       
            <a href="enviaraulas.php"><img src="../img/logo2pequena.png" alt=""></a>
       <h2>Bem vindo professor</h2>
        <a href="#" style="text-decoration: none;"
        id="entrar"><i class='bx bxs-user'><!-- nome do professor (php) --></i>
    </a>
      
        </nav>
    </header>
    <main>

    <div class="container1">

  
    <div class="box1">
    <h2>Curso<!-- curso que está dando aula PHP--></h2>
    </div>
<div class="box1">
<h2>Certificações/História</h2>
</div>

    </div>
    <div class="container2">
        <div class="box2">
            <h2>Perfil</h2>
            <div class="description">
                <img src="../img/thumb/149071.png" alt="user" width="250px">
                <!-- O professor poderá inserir informações no seu perfil (php)  -->
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur ab totam necessitatibus explicabo ut? Rerum explicabo accusantium voluptate eum beatae est sunt magni corrupti quis recusandae officiis, itaque pariatur eveniet!</p>
            </div>
            <h2>Enviar aula</h2>
            <div class="description">
                <form action="enviaraulas.php" method="$_POST">
                    <input type="file" name="aula" id="aula">
                    <textarea name="descrição " id="descrição" cols="30" rows="10">descrição</textarea>
                    <button id="aula">Enviar aula</button>
                </form>
            </div>
            
        </div>

    </div>
    </main>
    <footer>

    </footer>
</body>
</html>