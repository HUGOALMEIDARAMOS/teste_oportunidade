<?php

session_start();

require_once("./controller/usuarioDAO.php");
require_once ("./model/usuario.php");


$usuarioDAO = new usuarioDAO();
$usuario = new usuario();

//se o usuario já estiver logado o mesmo é redirecionado para a sua pagina de perfil

if(isset($_SESSION['logado']) ==1 ){
    header('Location:view/perfil_user.php');

}



?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"   content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:: Login ::</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <style>
        body{
           /* background-image: linear-gradient(to right, #ff8177 0%, #ff867a 0%, #ff8c7f 21%, #f99185 52%, #cf556c 78%, #b12a5b 100%);*/
            background-image: linear-gradient(to right, #37ecba 0%, #72afd3 100%);
            width: 100%;
            height: 100%;
            overflow: auto;
        }
    </style>

</head>
<body>

<div class="container-fluid ">


       <!--Inicio do formulário de login-->
        <form class="formulario" method="post" >
           <div class="row bg-transparent">
               <div class="col-sm-12 col-md-12">
                   <!--Aqui inseri uma linha com div que mostra mensagem de erro caso ocorra-->
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

            <div class="row ">
                <div class="col-sm-12 col-md-12 ">
                    <h2 class="text-light text-center">Login</h2>
                </div>
            </div>

            <div class="row ">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="txtemail" class="form-control  bg-transparent" id="txtemail"  placeholder="Digite seu E-mail" required>
                    </div>
                </div>
            </div>


            <div class="row ">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <input type="password" name="txtsenha" class="form-control bg-transparent" id="txtsenha"  placeholder="Digite seu senha" required>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-warning btn-logar" value="Acesso">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <a href="view/cadastro.php" class="btn btn-outline-secondary btn-logar">Efetuar Cadastrar</a>
                    </div>
                </div>

            </div>

               </div>
           </div>
        </form>

</div><!--container-fluid-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/alerta.js"></script>

</body>
</html>

<?php
  //se a "variavel" existir , então verifico no metodo login se existem, caso sim insiro um inteiro
  //para a sessão de logado, caso dê erro exivo a mensagem
 if(isset($_POST['btnSubmit'])){

    if($usuarioDAO->login($_POST['txtemail'], $_POST['txtsenha'])){
        $_SESSION['logado']=1;
        $_SESSION['email']=$_POST['txtemail'];
        $_SESSION['senha']=md5($_POST['txtsenha']);

             //após login confirmado
            //faco uma busca pelos usuarios comparando o email inserido com email gravado
            // e salvo na sessão o id do usuario
               foreach ($usuarioDAO->listarusuarios() as $resultado) {
                      if ($_POST['txtemail'] == $resultado['us_email'] ) {
                           $_SESSION['cod_user'] =$resultado['us_code'];
                          $_SESSION['foto']=$resultado['us_foto'];
                      }
               }
    }else{
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' id='alerta'>Usúario ou senha inválido.</div>";
        header("Location: index.php");
        echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL=index.php'>";
    }
 }

?>
