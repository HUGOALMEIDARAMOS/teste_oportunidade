<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 15/07/18
 * Time: 16:18
 */

require_once ("Conexao.php");
class senhaDAO
{
    function __construct(){
        $this -> con = new Conexao();
        $this->pdo = $this->con->Connect();
    }

    function cadastrar (senha $entSenha){
        try{
            $stmt = $this->pdo->prepare("INSERT INTO senha  VALUES (:usuario_us_code, :se_senha)");
              $param = array(
               ":usuario_us_code"=>$entSenha->getUsuarioUsCode(),
               ":se_senha"=>md5($entSenha->getSeSenha())
              );

              return $stmt->execute($param);

        }catch (PDOException $ex){
            echo "ERRO 01: {$ex->getMessage()}"; echo "</br>";

        }
    }




}