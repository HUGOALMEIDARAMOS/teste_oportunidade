<?php
session_start();
  if($_SESSION['logado'] !=1 ){
      header('Location:../index.php');
  }


$_SESSION['email'];
$_SESSION['senha'];
$_SESSION['cod_user'];
$_SESSION['foto'];

require_once ("../controller/usuarioDAO.php");
require_once ("../model/usuario.php");
$usuarioDAO = new usuarioDAO();
$usuario = new usuario();

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"   content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:: Perfil do usúario ::</title>
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
    if ($_SESSION['cod_user'] == $resultado['us_code'] ) {
        $nome = $resultado['us_nome'];
        $email = $resultado['us_email'];
        $foto =  $resultado['us_foto'];
        $id = $_SESSION['cod_user'];
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
                    <a href="edit_user.php?id=<?=$id;?>" class="btn btn-warning">Alterar Dados</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
             <div class="row ">
                <div class="col-md-12">
                    <div class="card shadow ">
                         <div class="card-header">
                             LISTA DE PACIENTES
                         </div>
                             <div class="card-body">
                                 <table id="alk-table" class="table table-striped table-bordered table-hover table-responsive-sm">
                                     <thead class="thead-dark">
                                     <tr class="text-center">
                                         <th scope="col">ID</th>
                                         <th scope="col">Nome</th>
                                         <th scope="col">Sobrenome</th>
                                         <th scope="col">avatar</th>
                                         <th scope="col">ação</th>
                                     </tr>
                                     </thead>
                                     <tbody></tbody>
                                 </table>
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
  if(isset($_GET['acao'])){
      if($_GET['acao'] == 'sair'){
          $_SESSION['logado']=0;
          unset($_SESSION['logado']);
           header("Location:../index.php");

      }
  }

?>