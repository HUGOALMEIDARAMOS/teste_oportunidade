<?php
session_start();

require_once("../controller/usuarioDAO.php");
require_once("../model/usuario.php");

require_once("../controller/senhaDAO.php");
require_once("../model/senha.php");

$usuarioDAO = new usuarioDAO();
$senhaDAO = new senhaDAO();

$usuario = new usuario();
$senha = new senha();

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

        <form class="formulario" method="post" enctype="multipart/form-data">


            <div class="row ">
                <div class="col-sm-12 col-md-12">
                    <h2 class="text-light text-center">Cadastro de Usúario</h2>
                </div>
            </div>
            <div class="row  bg-light mt-md-2 pt-2 rounded-top">
                 <div class="col-sm-12 col-md-12">
                      <div class="form-group ">
                         <label for="nome">Nome</label>
                         <input type="text" name="txtnome" class="form-control border-top-0 border-left-0 border-right-0 bg-transparent" id="nome"  placeholder="Digite  seu nome"    required>

                     </div>
                 </div>
            </div>

            <div class="row bg-light">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="txtemail" class="form-control border-top-0 border-left-0 border-right-0 bg-transparent" id="email"  placeholder="Digite seu E-mail" required>
                    </div>
                </div>
            </div>

            <div class="row bg-light">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="cpf">Cpf</label>
                        <input type="number" name="txtcpf" class="form-control border-top-0 border-left-0 border-right-0 bg-transparent" id="cpf"   required>
                    </div>
                </div>
            </div>

            <div class="row bg-light">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="data_nasc">Data Nascimento</label>
                        <input type="date" name="txtdata_nasc" class="form-control border-top-0 border-left-0 border-right-0 bg-transparent" id="data_nasc"  required>
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

            <div class="row bg-light">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="confsenha">Confirmar Senha</label>
                        <input type="password" name="txtconfsenha" class="form-control border-top-0 border-left-0 border-right-0 bg-transparent" id="confsenha"  placeholder="repita a senha">
                    </div>
                </div>
            </div>

            <div class="row bg-light">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="foto">Selecione arquivo</label>
                        <input type="file" name="txtfoto" class="form-control-file" id="foto">
                    </div>
                </div>
            </div>

            <div class="row bg-light rounded-bottom">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                       <input type="submit" name="btnSubmit" class="btn btn-warning" value="Cadastrar">
                    </div>
                </div>
            </div>
        </form>
    </div> <!--container-->
</div><!--container-fluid-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/alerta.js"></script>

</body>
</html>

<?php
if (isset($_POST['btnSubmit'])){ //isset -> verifica se a variavel existe
    $usuario->setUsNome($_POST['txtnome']);
    $usuario->setUsEmail($_POST['txtemail']);
    $usuario->setUsCpf($_POST['txtcpf']);
    $usuario->setUsDataNasci($_POST['txtdata_nasc']);
    $usuario->setUsFoto($_POST['txtfoto']);

    if (!$usuarioDAO->consultarEmail($_POST['txtemail'])) {

        if ($usuarioDAO->cadastrar($usuario)) {

            $codigoUsuario = $usuarioDAO->consultarCodUsuario($_POST['txtemail']);

            $senha->setUsuarioUsCode($codigoUsuario);
            $senha->setSeSenha($_POST['txtsenha']);

            if ($senhaDAO->cadastrar($senha)) {

                $_SESSION['msg'] = "<div class='alert alert-success' role='alert' id='alerta'>Cadastrado com sucesso</>";
                header('Location:/index.php');

            } else {

                $_SESSION['msg'] = "<div class='alert alertdanger' role='alert' id='alerta'>Erro  ao cadastrar.</>";
                header("Location: cadastro.php");

            }

        }
    }else{
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert' id='alerta'>Email já existe.</>";
        header("Location: cadastro.php");
    }
}

?>
