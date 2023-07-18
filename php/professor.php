<?php 
session_start();

function get_total_all_records(){
    include('conex.php');
    $stmt = $connection->prepare("SELECT * FROM Usuarios");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $stmt->rowCount();
}

if(empty($_SESSION)){
    echo "<script>location.href='php/login.php'</script>";
}
$nome = $_SESSION['nome'];
$id = $_SESSION['idUsuarios'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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
    background-color:#0b090951;
    border-radius: 15px;
    margin: 25px 25px;
    color: #fff;
}
.box2{
    width: 650px;
    height: 925px;
    background-color: #0b090951;
    border-radius: 15px;
    margin: 25px 25px;
}
.description{
    display: flex;
    margin: 25px 5px 25px 5px;
    align-items: center;
    justify-content: center;
    color: #fff;
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
input{
    width: 150px;
    size: 250px;
    border: 1px solid aqua;
    border-radius:30px ;
    background-color: transparent;
    color: #fff;
}
.enviaulas{
    display: flex;
    gap: 15px;
}

textarea {
    margin-top: 25px;
    border: 2px solid  rgb(116, 211, 179);
    outline: none;
    resize: none;
    width: 80%;
    color: white;
    background-color: transparent  ;
}

#aula {
padding: 10px;
outline: none;
width: 80%;
height: 40px;
}

#cursocontent{
 text-align: center;
}

@media screen and (max-width : 1040px) {
        main{
            display: flex;
            flex-direction: column;
            max-width: 150vh;
            justify-content: center;
        }
        .description{
            display: flex;
            flex-direction: column;
        }
        .box2{
            display: flex;
            flex-direction: column;
            max-width: 450px;

        }
        img{
            width: 150px;
        }
        
}

    </style>
</head>
<body>
    <header>

        <nav>
       
            <a href="enviaraulas.php"><img src="../img/logo2pequena.png" alt=""></a>
       <h2>Bem vindo professor</h2>
        <a href="#" style="text-decoration: none;"
        id="entrar"><i class='bx bxs-user' style="margin-right: 50px;"><?php echo $nome   ?></i>
    </a>
        </nav>
    </header>
    <main>

    <div class="container1">
    <div class="box1">
    <h2>Cursos</h2>
    <div id="cursocontent">

    <?php
include_once('conex.php');
$sql = "SELECT idCursos, nome FROM Cursos WHERE Usuarios_idUsuarios = '$id';";
$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $idCurso = $row['idCursos'];
        $curso = $row['nome'];
        echo "<a href='cadastraraula.php?id=$idCurso'>$curso</a><br>";
    }
}
?>



    <!-- link para adicionar curso , coloquei aqui aleatoriamente ,temos que achar um lugar para ele -->
    <a href="cadastrarcurso.php"><input style="margin-top: 60%;" type="submit" value="Enviar Curso"></a>
    </div>
    </div>
<div class="box1">
<h2>Certificações/História</h2>
</div>

    </div>
    <div class="container2">
        <div class="box2">
            <h2>Perfil</h2>
            <div class="description">
                <!-- O professor poderá inserir informações no seu perfil (php)  -->
                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['legal'])) {
                    include_once('conex.php');
                    $id = $_SESSION['idUsuarios'];
                    $destino = '../img/alunosimg/' . $_FILES['imagem']['name'];
                    move_uploaded_file($_FILES['imagem']['tmp_name'], $destino);
                    $caminhoImagem = $conn->real_escape_string($destino);
                    $sql = "UPDATE Usuarios SET imagem = '$caminhoImagem' WHERE idUsuarios = $id";
                    $conn->query($sql);
                }

                include_once('conex.php');
                $id = $_SESSION['idUsuarios'];
                $sql = "SELECT imagem FROM Usuarios WHERE idUsuarios = $id";
                $resultado = $conn->query($sql);

                if ($resultado && $resultado->num_rows > 0) {
                    $row = $resultado->fetch_assoc();
                    $caminhoImagem = $row['imagem'];

                    if (!empty($caminhoImagem)) {
                        echo "<img src='$caminhoImagem' alt='user' width='250px'>";
                    } else {
                        echo "<img src='../img/thumb/149071.png' alt='user' width='250px'>";
                    }
                } else {
                    echo "<img src='../img/thumb/149071.png' alt='user' width='250px'>";
                }
                ?>

                <button type="button" class="botaofoto" style="position: relative;" data-bs-toggle="modal" data-bs-target="#exampleFoto">
                    Alterar
                </button>
                <div class="modal fade" id="exampleFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizar</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="rodape"></div>
                                <div class="modal-principal">
                                    <?php
                                    include_once('conex.php');
                                    $id = $_SESSION['idUsuarios'];
                                    $sql = "SELECT imagem FROM Usuarios WHERE idUsuarios = $id";
                                    $resultado = $conn->query($sql);

                                    if ($resultado && $resultado->num_rows > 0) {
                                        $row = $resultado->fetch_assoc();
                                        $caminhoImagem = $row['imagem'];

                                        if (!empty($caminhoImagem)) {
                                            echo "<img src='$caminhoImagem' alt='user' width='250px'>";
                                        } else {
                                            echo "<img src='../img/thumb/149071.png' alt='user' width='250px'>";
                                        }
                                    } else {
                                        echo "<img src='../img/thumb/149071.png' alt='user' width='250px'>";
                                    }
                                    ?>

                                    <form method="post" enctype="multipart/form-data">
                                        <input type="file" name="imagem">
                                        <input type="submit" name="legal" value="Confirmar">
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur ab totam necessitatibus explicabo ut? Rerum explicabo accusantium voluptate eum beatae est sunt magni corrupti quis recusandae officiis, itaque pariatur eveniet!</p>
            </div>

            
        </div>

    </div>
    </main>
    <footer>

    </footer>
</body>
</html>