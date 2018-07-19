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
// Constante responsável por guardar a pasta de onde os arquivos estarão.
   const _FOLDER_DIR = "../assets/imagens/upload/";

    // Variável para guardar o array relacionado ao arquivo.
   public $_file;

    function __construct($curFile)
    {
        if(!file_exists(self::_FOLDER_DIR)){
            mkdir(self::_FOLDER_DIR);
        }
        $this->_file = $curFile;
        $this -> con = new Conexao();
        $this->pdo = $this->con->Connect();



    }


    function cadastrar(usuario $entUsuario){

        try {

            if(isset($this->_file)) {
                $randomName = rand(00, 9999);
                $fileName = self::_FOLDER_DIR . "_" . $randomName . "_" . $this->_file["name"];
                if (is_uploaded_file($this->_file["tmp_name"])) {
                    $upload = move_uploaded_file($this->_file["tmp_name"], $fileName);
                }
            }
              if ($upload==true){

            $stmt = $this->pdo->prepare("INSERT INTO usuario (us_nome, us_email, us_data_nasc, us_cpf,  us_foto, us_ip) VALUES (:us_nome, :us_email,:us_data_nasci, :us_cpf, :us_foto,  :us_ip)");
            $param = array(

                ":us_nome" => $entUsuario->getUsNome(),
                ":us_email" => $entUsuario->getUsEmail(),
                ":us_data_nasci" =>$entUsuario->getUsDataNasci(),
                ":us_cpf" => $entUsuario->getUsCpf(),
                ":us_foto" => $fileName,
                ":us_ip" => $_SERVER["REMOTE_ADDR"]
            );

            return $stmt->execute($param);

              }
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
                return $consulta['us_code']; $consulta['us_email'];$consulta['us_nome'];

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

    public  function listarusuarios(){
        try{
            $stmt=$this->pdo->prepare("SELECT * from usuario ORDER BY us_code DESC ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }catch (PDOException $e){
            echo "ERRO: {$e->getMessage()}";
        }
    }


    function editar(usuario $editUsuario){

        $stmt = $this->pdo->prepare("SELECT us_foto FROM usuario where  us_code = {$_SESSION['cod_user']}");
        $param = array(":us_code"=>$editUsuario->$_SESSION['cod_user'],);
        $stmt->execute($param);
        if ($stmt-> rowCount() > 0){
            $consulta = $stmt->fetch(PDO::FETCH_ASSOC);
            return $consulta['us_foto'];$consulta['us_code'];
            if($consulta['us_code']==$_SESSION['cod_user']){
                $nome_imagem=$consulta['us_foto'];
                $buscar_nome=substr($nome_imagem, 25);
                unlink(_FOLDER_DIR.$buscar_nome );
            }
        }

        try{

            if(isset($this->_file)) {
                $randomName = rand(00, 9999);
                $fileName =self::_FOLDER_DIR . "_" . $randomName . "_" . $this->_file["name"];
                if (is_uploaded_file($this->_file["tmp_name"])) {
                    $upload = move_uploaded_file($this->_file["tmp_name"], $fileName);
                }
            }
            if ($upload==true){

                $stmt = $this->pdo->prepare("UPDATE usuario SET us_nome = :us_nome, us_email = :us_email, us_foto = :us_foto WHERE us_code = :us_code");
                $param = array(

                    ":us_code"=>$editUsuario->getUsCode(),
                    ":us_nome" => $editUsuario->getUsNome(),
                    ":us_email" => $editUsuario->getUsEmail(),
                    ":us_foto" => $fileName,

                );

                return $stmt->execute($param);

            }
        } catch (PDOException $e){
            echo "ERRO: {$e->getMessage()}";

        }
    }

}