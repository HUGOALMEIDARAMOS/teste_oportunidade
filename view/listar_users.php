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
                           <tbody></tbody>
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

