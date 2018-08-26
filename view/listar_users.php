<?php
session_start();
if($_SESSION['logado'] !=1 ){
    header('Location:../index.php');
}

 require_once ("../controller/usuarioDAO.php");
$usuarioDAO = new usuarioDAO();

$_SESSION['cod_user'];
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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark pt-0  pb-0">
    <a class="navbar-brand h1 mb-0" href="#">Hospital</a>
    <div class="collapse navbar-collapse" id="navbarSite">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="perfil_user.php">Visualizar Perfil</a>
            </li>
        </ul>
    </div>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <?php
                    foreach ($usuarioDAO->listarusuarios() as $resultado) {
                        if( $_SESSION['cod_user'] ==$resultado['us_code']) {
                             $foto=$resultado['us_foto'];

                      ?>
                      <img src="<?=$foto;?>" class="rounded-circle" width=50" height="50">
                      <?php
                  }}
                ?>
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
        <div class="col-md-12 ">
            <div class="card shadow">
                   <div class="card-body">
                      <h5 class="card-title">Lista de usúarios cadastrados</h5>
                       <table id="alk-table" class="table table-striped table-bordered table-hover table-responsive-sm">
                           <thead class="thead-dark">
                           <tr class="text-center">
                               <th scope="col">Nome</th>
                               <th scope="col">E-mail</th>
                               <th scope="col">Foto</th>
                           </tr>
                           </thead>
                           <tbody>
                           <?php
                           foreach ($usuarioDAO->listarusuarios() as $resultado) {
                                      $id=$resultado['us_code'];
                               ?>

                               <tr>
                                   <td><?=$resultado['us_nome'];?></td>
                                   <td><?=$resultado['us_email'];?></td>
                                   <td class="text-center"> <img src="<?=$resultado['us_foto'];?>" class="rounded-circle"> </td>
                               </tr>
                               <?php
                           }
                           ?>
                           </tbody>
                       </table>

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
    <!--<script src="../assets/js/api.js"></script>-->
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

