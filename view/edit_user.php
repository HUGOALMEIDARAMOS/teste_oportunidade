<?php
session_start();
if(isset($_SESSION['logado']) !=1 ){
    header('Location:../index.php');
}

$id = $_GET['id'];
require_once ("../controller/usuarioDAO.php");
require_once ("../model/usuario.php");
$usuarioDAO = new usuarioDAO($_FILES["arquivo"]);
$usuario = new usuario();

?>

    <!doctype html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"   content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cadastro de Usúario</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/estilo.css">

        <style>
            body{
                background-color:#F5F5F5;
            }
        </style>


    </head>
    <body>


    <?php
    foreach ($usuarioDAO->listarusuarios() as $resultado) {
    if ($id == $resultado['us_code'] ) {
       $nome = $resultado['us_nome'];
       $email = $resultado['us_email'];
        $foto =  $resultado['us_foto'];

      }
    }
    ?>
    <?php
    {

    ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-0  pb-0">
        <a class="navbar-brand h1 mb-0" href="#">Hospital</a>
        <div class="collapse navbar-collapse" id="navbarSite">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="listar_users.php">Listar Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="perfil_user.php">Visualizar Perfil</a>
                </li>
            </ul>
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="<?= $foto; ?>" class="rounded-circle" width=50" height="50">
                    <span class="d-lg-none d-md-block">Some Actions</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="?acao=sair">Sair</a>
                </div>
            </li>
        </ul>

    </nav>



    <div class="container">
        <div class="row ml-2 mr-2 mt-4">
            <div class="col-md-4 ">
                <div class="card shadow">
                    <img class="card-img-top" src="<?=$foto;?>" alt="Minha foto">
                    <div class="card-body">
                        <h5 class="card-title"><?=$nome;?></h5>
                        <p class="card-text"><?=$email;?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow ">
                            <div class="row align-middle">
                                <div class="col-md-12 pt-3 ">
                                    <h2 class="text-center">Editar Dados</h2>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <?php
                                            if(isset($_SESSION['msg'])){
                                                echo $_SESSION['msg'];
                                                unset($_SESSION['msg']);
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <form class="formulario_edit" method="post" enctype="multipart/form-data">

                                        <input type="hidden" name="use_id" id="use_id" value="<?php echo $id ;?>">

                                        <div class="form-group ">
                                            <label for="nome">Nome</label>
                                            <input type="text" name="txtnome" class="form-control  bg-transparent text-warning"  id="txtnome" value="<?php echo $nome; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="txtemail"   class="form-control  bg-transparent text-warning"   id="txtemail" value="<?php echo $email; ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto">Selecione nova foto</label>
                                            <input type="file" name="arquivo" class="form-control-file" id="arquivo" value="<?php echo $foto; ?>">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" name="btnSubmit" class="btn btn-warning text-dark"
                                                   value="Alterar dados">
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <?php
            }
            ?>


        </div><!--container-->



        <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/alerta.js"></script>
        <script src="../assets/js/api.js"></script>
    </body>
    </html>


<?php


if (isset($_POST['btnSubmit'])) { //isset -> verifica se a variavel existe

    $usuario->setUsCode($_POST['use_id']);
    $usuario->setUsNome($_POST['txtnome']);
    $usuario->setUsEmail($_POST['txtemail']);
    $usuario->setUsFoto($_FILES['arquivo']);


    if ($usuarioDAO->editar($usuario)) {

         echo "<meta HTTP-EQUIV='refresh' CONTENT='3;URL=perfil_user.php'>";

    }
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert' id='alerta'>Salvo com sucesso. Redirecionando</div>";
}

?>




<?php
if(isset($_GET['acao'])){
    if($_GET['acao'] == 'sair'){
        $_SESSION['logado']=0;
        unset($_SESSION['logado']);
        header("Location:../index.php");

    }
}

?>