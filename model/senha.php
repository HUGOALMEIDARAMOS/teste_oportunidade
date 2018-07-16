<?php
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 07/07/18
 * Time: 21:46
 */

class senha
{
    private $usuario_us_code;
    private $se_senha;
    /**
     * @return mixed
     */
    public function getUsuarioUsCode()
    {
        return $this->usuario_us_code;
    }

    /**
     * @param mixed $usuario_us_code
     */
    public function setUsuarioUsCode($usuario_us_code)
    {
        $this->usuario_us_code = $usuario_us_code;
    }




    public function getSeSenha()
    {
        return $this->se_senha;
    }

    public function setSeSenha($se_senha)
    {
        $this->se_senha = $se_senha;
    }



}