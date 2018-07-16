<?php
session_start();
require_once("./controller/usuarioDAO.php");

$usuarioDAO = new usuarioDAO();

//se o usuario já estiver logado o mesmo é redirecionado para a sua pagina de perfil
if($_SESSION['logado'] ==1 ){
    header('Location:view/perfil_user.php');

}

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"   content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Usúario</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilo.css">


    <style>
        body{
            margin: 0px;
            padding:0px;
            background: #8E2DE2;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to bottom, #4A00E0, #8E2DE2);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to bottom, #4A00E0, #8E2DE2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
    </style>
</head>
<body>
<div class="container-fluid ">
    <div class="container">


        <form class="formulario" method="post" >


            <div class="row ">
                <div class="col-sm-12 col-md-12 rounded">
                    <h2 class="text-light text-center">Login</h2>
                </div>
            </div>

            <div class="row bg-light">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="txtemail" class="form-control border-top-0 border-left-0 border-right-0 bg-transparent" id="txtemail"  placeholder="Digite seu E-mail" required>
                    </div>
                </div>
            </div>


            <div class="row bg-light">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="txtsenha" class="form-control border-top-0 border-left-0 border-right-0 bg-transparent" id="txtsenha"  placeholder="Digite seu senha" >
                    </div>
                </div>
            </div>

            <div class="row bg-light rounded">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-warning" value="Logar">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <a href="view/cadastro.php" class="btn btn-info">Cadastrar</a>
                    </div>
                </div>

            </div>
        </form>
    </div> <!--container-->
</div><!--container-fluid-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/alerta.js"></script>

</body>
</html>

<?php


if(isset($_POST['btnSubmit'])){
    if($usuarioDAO->login($_POST['txtemail'], $_POST['txtsenha'] )){
        $_SESSION['logado']=1;
        $_SESSION['email']=$_POST['txtemail'];
        $_SESSION['senha']=md5($_POST['txtsenha']);
        header('Location:view/perfil_user.php');


    }else{
        ?>
        <script type="text/javascript">
             alert("Usúario ou senha inválidos.");
        </script>
       <?php
    }
}

?>
