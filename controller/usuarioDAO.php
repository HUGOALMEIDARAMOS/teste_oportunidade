<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 07/07/18
 * Time: 21:53
 */

require_once ("Conexao.php");

class usuarioDAO
{
    function __construct()
    {
        $this -> con = new Conexao();
        $this->pdo = $this->con->Connect();
    }


    function cadastrar(usuario $entUsuario){
        try {
            $stmt = $this->pdo->prepare("INSERT INTO usuario (us_nome, us_email, us_data_nasc, us_cpf,  us_foto, us_ip) VALUES (:us_nome, :us_email,:us_data_nasci, :us_cpf, :us_foto,  :us_ip)");
            $param = array(

                ":us_nome" => $entUsuario->getUsNome(),
                ":us_email" => $entUsuario->getUsEmail(),
                ":us_data_nasci" =>$entUsuario->getUsDataNasci(),
                ":us_cpf" => $entUsuario->getUsCpf(),
                ":us_foto" => $entUsuario->getUsFoto(),
                ":us_ip" => $_SERVER["REMOTE_ADDR"]
            );

            return $stmt->execute($param);


        }catch (PDOException $ex){
            echo "ERRO 01: {$ex->getMessage()}";
            }
    }

    function consultarCodUsuario($us_email){
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE  us_email =:us_email");
             $param = array(":us_email"=>$us_email);

             $stmt->execute($param);

            if ($stmt-> rowCount() > 0){
                $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
                return $consulta['us_code'];
            }else{
                return "";
            }

        }catch (PDOException $ex){
            echo "ERRO 02: {$ex->getMessage()}";
        }
    }


    function consultarEmail($us_email){
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE  us_email =:us_email");
            $param = array(":us_email"=>$us_email);

            $stmt->execute($param);

            if ($stmt-> rowCount() > 0){
               return true;
            }else{
                return false;
            }

        }catch (PDOException $ex){
            echo "ERRO 03: {$ex->getMessage()}";
        }
    }


    function login($us_email, $se_senha){
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM usuario  INNER JOIN senha ON  senha.usuario_us_code = usuario.us_code  WHERE  usuario.us_email = :us_email AND senha.us_senha = :se_senha");
            $param = array(
                ":us_email"=>$us_email,
                ":se_senha"=>md5($se_senha)
            );

            $stmt->execute($param);

            if ($stmt-> rowCount() > 0){
                return true;
            }else{
                return false;
            }

        }catch (PDOException $ex){
            echo "ERRO 04: {$ex->getMessage()}";
        }
    }



}