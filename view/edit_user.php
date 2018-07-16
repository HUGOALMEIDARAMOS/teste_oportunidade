<?php
session_start();
if($_SESSION['logado'] !=1 ){
    header('Location:../index.php');
}
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <a class="navbar-brand text-left" href="#">Hospital São Domingos</a>
        <p class="text-light text-right"><a href="?acao=sair">SAIR</a></p>

    </nav>
    <?php
    echo $_SESSION['email']; echo "</br>";
    echo $_SESSION['senha'];
    ?>

    <div class="container">
        <div class="row ml-2 mr-2 mt-4">
            <div class="col-md-4 ">
                <div class="card shadow">
                    <img class="card-img-top" src="../assets/imagens/user.jpg" alt="Minha foto">
                    <div class="card-body">
                        <h5 class="card-title">Hugo Leonardo</h5>
                        <p class="card-text">hugo.undb@gmail.com.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow ">
                            <div class="row align-middle">
                                <div class="col-md-12">
                                    <h2>Editar Dados</h2>
                                    <form class="formulario" method="post" enctype="multipart/form-data">
                                        <div class="form-group ">
                                            <label for="nome">Nome</label>
                                            <input type="text" name="txtnome" class="form-control border-top-0 border-left-0 border-right-0 bg-transparent" id="nome"  placeholder="Digite  seu nome"    required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="txtemail" class="form-control border-top-0 border-left-0 border-right-0 bg-transparent" id="email"  placeholder="Digite seu E-mail" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto">Selecione nova foto</label>
                                            <input type="file" name="txtfoto" class="form-control-file" id="foto">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="btnSubmit" class="btn btn-warning text-dark" value="Alterar dados">
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



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
if(isset($_GET['acao'])){
    if($_GET['acao'] == 'sair'){
        $_SESSION['logado']=0;
        unset($_SESSION['logado']);
        header("Location:../index.php");

    }
}

?>